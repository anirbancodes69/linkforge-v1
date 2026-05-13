<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Models\LinkVisit;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

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
        | Agent Detection
        |--------------------------------------------------------------------------
        */

        $agent = new Agent();

        $position = Location::get($request->ip());

        /*
        |--------------------------------------------------------------------------
        | Store Visit
        |--------------------------------------------------------------------------
        */

        LinkVisit::create([

            'link_id' => $link->id,

            'ip_address' => $request->ip(),

            'browser' => $agent->browser(),

            'device' => $this->detectDeviceType($agent),

            'platform' => $agent->platform(),

            'user_agent' => $request->userAgent(),

            'referrer' => $request->headers->get('referer'),

            'visited_at' => now(),

            'country' => $position ? $position->countryName : null,

            'city' => $position ? $position->cityName : null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Increment Counter
        |--------------------------------------------------------------------------
        */

        $link->increment('clicks_count');

        /*
        |--------------------------------------------------------------------------
        | Redirect
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
    }

    private function detectDeviceType(Agent $agent): string
    {
        if ($agent->isTablet()) {

            return 'Tablet';
        }

        if ($agent->isMobile()) {

            return 'Mobile';
        }

        if ($agent->isDesktop()) {

            return 'Desktop';
        }

        return 'Other';
    }
}
