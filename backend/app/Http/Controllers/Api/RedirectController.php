<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\StoreLinkVisitJob;
use App\Models\Link;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __invoke(Request $request, string $code)
    {
        /*
        |--------------------------------------------------------------------------
        | Find Link
        |--------------------------------------------------------------------------
        */

        $link = Link::where(function ($query) use ($code) {

            $query->where('short_code', $code)
                ->orWhere('custom_alias', $code);
        })
            ->where('is_active', true)
            ->first();

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

        if ($link->safety_status === 'malicious') {

            abort(403, 'Unsafe destination blocked');
        }

        if ($link->safety_status === 'pending') {

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
        | Store Visit (Async)
        |--------------------------------------------------------------------------
        */

        StoreLinkVisitJob::dispatch(
            $link,
            $request->ip(),
            $request->userAgent(),
            $request->headers->get('referer')
        );

        /*
         |--------------------------------------------------------------------------
         | Check for Password Protection
         |--------------------------------------------------------------------------
         */

        /* |-------------------------------------------------------------------------- 
        | Safe Redirect |
        -------------------------------------------------------------------------- */
        return redirect()->away($link->original_url);
    }
}
