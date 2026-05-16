<?php

namespace App\Services;

use App\Jobs\StoreLinkVisitJob;
use App\Repositories\RedirectRepository;
use Illuminate\Http\Request;

class RedirectService
{
    public function __construct(
        protected RedirectRepository $redirectRepository,
    ) {}

    public function handle(
        Request $request,
        string $code
    ) {

        /*
        |--------------------------------------------------------------------------
        | Find Link
        |--------------------------------------------------------------------------
        */

        $link = $this->redirectRepository
            ->findActiveLinkByCode($code);

        /*
        |--------------------------------------------------------------------------
        | Not Found
        |--------------------------------------------------------------------------
        */

        if (!$link) {

            abort(404);
        }

        /*
        |--------------------------------------------------------------------------
        | Expired
        |--------------------------------------------------------------------------
        */

        if (
            $link->expires_at &&
            now()->greaterThan($link->expires_at)
        ) {

            abort(410, 'Link expired');
        }

        /*
        |--------------------------------------------------------------------------
        | Safety Check
        |--------------------------------------------------------------------------
        */

        if (
            $link->safety_status === 'malicious'
        ) {

            abort(
                403,
                'Unsafe destination blocked'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Pending Scan
        |--------------------------------------------------------------------------
        */

        if (
            $link->safety_status === 'pending'
        ) {

            return response()->view(
                'links.pending-scan',
                [
                    'link' => $link,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Increment Counter
        |--------------------------------------------------------------------------
        */

        $link->increment('clicks_count');

        /*
        |--------------------------------------------------------------------------
        | Store Visit
        |--------------------------------------------------------------------------
        */

        StoreLinkVisitJob::dispatch(

            $link,

            $request->ip(),

            $request->userAgent(),

            $request->headers
                ->get('referer'),
        );

        /*
        |--------------------------------------------------------------------------
        | Safe Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()->away(
            $link->original_url
        );
    }
}