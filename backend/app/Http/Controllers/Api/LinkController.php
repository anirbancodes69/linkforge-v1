<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
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

    public function store(Request $request)
    {
        $validated = $request->validate([

            'original_url' => [
                'required',
                'max:2048',
                'regex:/^(https?:\/\/)[^\s$.?#].[^\s]*$/i'
            ],

            'custom_alias' => [
                'nullable',
                'alpha_dash',
                'min:3',
                'max:50',
                'unique:links,custom_alias',
            ],
        ]);

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
                'message' => 'Alias is reserved',
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
    | Create Link
    |--------------------------------------------------------------------------
    */

        $link = Link::create([

            // 'user_id' => auth()->id(),
            'user_id' => Auth::id(),

            'guest_token' => Auth::check()
                ? null
                : $guestToken,

            'original_url' => $validated['original_url'],

            'short_code' => $this->generateUniqueCode(),

            'custom_alias' => $validated['custom_alias'] ?? null,
        ]);

        /*
    |--------------------------------------------------------------------------
    | Response
    |--------------------------------------------------------------------------
    */

        return response()
            ->json([
                'success' => true,
                'message' => 'Link created successfully',
                'link' => $link,
                'short_url' => url($link->custom_alias ?? $link->short_code),
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

    public function update(Request $request, Link $link)
    {
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

        $validated = $request->validate([
            'original_url' => [
                'required',
                'max:2048',
                'regex:/^(https?:\/\/)[^\s$.?#].[^\s]*$/i'
            ],

            'custom_alias' => [
                'nullable',
                'alpha_dash',
                'min:3',
                'max:50',
                'unique:links,custom_alias,' . $link->id,
            ],
        ]);

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
                'message' => 'Alias is reserved',
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
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Link updated successfully',
            'link' => $link,
            'short_url' => url($link->custom_alias ?? $link->short_code),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Link
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request, Link $link)
    {
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
            'message' => 'Link deleted successfully',
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
            Link::where('short_code', $code)->exists()
        );

        return $code;
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
