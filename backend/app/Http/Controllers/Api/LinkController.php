<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\ScanUrlJob;
use App\Models\Link;
use App\Services\UrlSafetyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | List User Links
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $links = Link::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json($links);
    }

    /*
    |--------------------------------------------------------------------------
    | Store Link
    |--------------------------------------------------------------------------
    */

    public function store(
        Request $request,
        UrlSafetyService $urlSafetyService
    ) {

        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [

                'original_url' => [
                    'required',
                    'max:2048',
                    'url:http,https',
                ],

                'custom_alias' => [
                    'nullable',
                    'regex:/^[A-Za-z0-9_-]+$/',
                    'min:3',
                    'max:50',
                    'unique:links,custom_alias',
                ],
            ],
            [
                'custom_alias.regex' =>
                'Alias may only contain letters, numbers, hyphens (-), and underscores (_).',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Normalize URL
        |--------------------------------------------------------------------------
        */

        $validated['original_url'] = $this->normalizeUrl(
            $validated['original_url']
        );

        /*
        |--------------------------------------------------------------------------
        | Lightweight Security Checks
        |--------------------------------------------------------------------------
        */

        if (
            $urlSafetyService->failsLightweightChecks(
                $validated['original_url']
            )
        ) {

            return response()->json([
                'success' => false,
                'message' => 'Unsafe destination URL detected.',
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Reserved Alias Protection
        |--------------------------------------------------------------------------
        */

        if (
            isset($validated['custom_alias']) &&
            in_array(
                strtolower($validated['custom_alias']),
                $this->reservedAliases()
            )
        ) {

            return response()->json([
                'success' => false,
                'message' => 'Alias is reserved.',
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Generate Guest Token
        |--------------------------------------------------------------------------
        */

        $guestToken = $request->cookie('guest_token');

        if (!$guestToken) {

            $guestToken = Str::uuid()->toString();
        }

        /*
        |--------------------------------------------------------------------------
        | Existing Link Deduplication
        |--------------------------------------------------------------------------
        */

        if (
            empty($validated['custom_alias'])
        ) {

            $existingLink = Link::query()

                ->where(
                    'original_url',
                    $validated['original_url']
                )

                ->where(
                    'is_active',
                    true
                )

                ->where(function ($query) use ($guestToken) {

                    /*
                    |--------------------------------------------------------------------------
                    | Logged In User
                    |--------------------------------------------------------------------------
                    */

                    if (Auth::check()) {

                        $query->where(
                            'user_id',
                            Auth::id()
                        );

                        return;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Guest User
                    |--------------------------------------------------------------------------
                    */

                    $query->where(
                        'guest_token',
                        $guestToken
                    );
                })

                ->latest()

                ->first();

            /*
            |--------------------------------------------------------------------------
            | Return Existing Link
            |--------------------------------------------------------------------------
            */

            if ($existingLink) {

                return response()
                    ->json([

                        'success' => true,

                        'message' => 'Existing short link returned.',

                        'link' => $existingLink,

                        'short_url' => url(
                            $existingLink->custom_alias
                                ??
                                $existingLink->short_code
                        ),
                    ])
                    ->cookie(
                        'guest_token',
                        $guestToken,
                        60 * 24 * 30
                    );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Create Link
        |--------------------------------------------------------------------------
        */

        $link = Link::create([

            'user_id' => Auth::id(),

            'guest_token' => Auth::check()
                ? null
                : $guestToken,

            'original_url' => $validated['original_url'],

            'short_code' => $this->generateUniqueCode(),

            'custom_alias' => $validated['custom_alias'] ?? null,

            'safety_status' => 'pending',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Dispatch Async URL Scan
        |--------------------------------------------------------------------------
        */

        ScanUrlJob::dispatch($link);

        /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */

        return response()
            ->json([
                'success' => true,
                'message' => 'Link created successfully.',
                'link' => $link,
                'short_url' => url(
                    $link->custom_alias
                        ??
                        $link->short_code
                ),
            ])
            ->cookie(
                'guest_token',
                $guestToken,
                60 * 24 * 30
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Link
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Link $link,
        UrlSafetyService $urlSafetyService
    ) {

        /*
        |--------------------------------------------------------------------------
        | Ownership Check
        |--------------------------------------------------------------------------
        */

        abort_if(
            $request->user()->id !== $link->user_id,
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [

                'original_url' => [
                    'required',
                    'max:2048',
                    'url:http,https',
                ],

                'custom_alias' => [
                    'nullable',
                    'regex:/^[A-Za-z0-9_-]+$/',
                    'min:3',
                    'max:50',
                    'unique:links,custom_alias,' . $link->id,
                ],
            ],
            [
                'custom_alias.regex' =>
                'Alias may only contain letters, numbers, hyphens (-), and underscores (_).',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Normalize URL
        |--------------------------------------------------------------------------
        */

        $validated['original_url'] = $this->normalizeUrl(
            $validated['original_url']
        );

        /*
        |--------------------------------------------------------------------------
        | Detect URL Change
        |--------------------------------------------------------------------------
        */

        $urlChanged = (
            $link->original_url !==
            $validated['original_url']
        );

        /*
        |--------------------------------------------------------------------------
        | Lightweight Security Checks
        |--------------------------------------------------------------------------
        */

        if (
            $urlSafetyService->failsLightweightChecks(
                $validated['original_url']
            )
        ) {

            return response()->json([
                'success' => false,
                'message' => 'Unsafe destination URL detected.',
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Reserved Alias Protection
        |--------------------------------------------------------------------------
        */

        if (
            isset($validated['custom_alias']) &&
            in_array(
                strtolower($validated['custom_alias']),
                $this->reservedAliases()
            )
        ) {

            return response()->json([
                'success' => false,
                'message' => 'Alias is reserved.',
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Update Link
        |--------------------------------------------------------------------------
        */

        $link->update([

            'original_url' => $validated['original_url'],

            'custom_alias' => $validated['custom_alias'] ?? null,

            'safety_status' => $urlChanged
                ? 'pending'
                : $link->safety_status,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Dispatch Async URL Scan
        |--------------------------------------------------------------------------
        */

        if ($urlChanged) {

            ScanUrlJob::dispatch($link);
        }

        /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success' => true,
            'message' => 'Link updated successfully.',
            'link' => $link,
            'short_url' => url(
                $link->custom_alias
                    ??
                    $link->short_code
            ),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Link
    |--------------------------------------------------------------------------
    */

    public function destroy(
        Request $request,
        Link $link
    ) {

        /*
        |--------------------------------------------------------------------------
        | Ownership Check
        |--------------------------------------------------------------------------
        */

        abort_if(
            $request->user()->id !== $link->user_id,
            403
        );

        $link->delete();

        return response()->json([
            'success' => true,
            'message' => 'Link deleted successfully.',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Generate Unique Short Code
    |--------------------------------------------------------------------------
    */

    private function generateUniqueCode(): string
    {
        do {

            $code = Str::random(6);
        } while (

            Link::where(
                'short_code',
                $code
            )->exists()
        );

        return $code;
    }

    /*
    |--------------------------------------------------------------------------
    | Normalize URL
    |--------------------------------------------------------------------------
    */

    private function normalizeUrl(string $url): string
    {
        $url = trim($url);

        $parts = parse_url($url);

        $scheme = strtolower(
            $parts['scheme'] ?? 'https'
        );

        $host = strtolower(
            $parts['host'] ?? ''
        );

        $path = $parts['path'] ?? '';

        $query = isset($parts['query'])
            ? '?' . $parts['query']
            : '';

        /*
        |--------------------------------------------------------------------------
        | Remove Trailing Slash
        |--------------------------------------------------------------------------
        */

        $path = rtrim($path, '/');

        return "{$scheme}://{$host}{$path}{$query}";
    }

    /*
    |--------------------------------------------------------------------------
    | Reserved Aliases
    |--------------------------------------------------------------------------
    */

    private function reservedAliases(): array
    {
        return [
            'login',
            'register',
            'logout',
            'dashboard',
            'settings',
            'links',
            'analytics',
            'pricing',
            'api',
            'admin',
            'qr',
            'docs',
            'support',
        ];
    }
}
