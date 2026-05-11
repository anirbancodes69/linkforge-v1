<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\LinkVisit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        /*
        |--------------------------------------------------------------------------
        | Stats
        |--------------------------------------------------------------------------
        */

        $totalLinks = Link::where(
            'user_id',
            $user->id
        )->count();

        $totalClicks = Link::where(
            'user_id',
            $user->id
        )->sum('clicks_count');

        $clicksToday = LinkVisit::whereHas(
            'link',
            fn($q) => $q->where('user_id', $user->id)
        )
        ->whereDate('visited_at', today())
        ->count();

        $activeLinks = Link::where(
            'user_id',
            $user->id
        )
        ->where('is_active', true)
        ->count();

        /*
        |--------------------------------------------------------------------------
        | Recent Links
        |--------------------------------------------------------------------------
        */

        $recentLinks = Link::where(
            'user_id',
            $user->id
        )
        ->latest()
        ->take(5)
        ->get();

        /*
        |--------------------------------------------------------------------------
        | Click Chart (Last 7 Days)
        |--------------------------------------------------------------------------
        */

        $chart = LinkVisit::selectRaw("
                DATE(visited_at) as date,
                COUNT(*) as clicks
            ")
            ->whereHas('link', function ($q) use ($user) {

                $q->where('user_id', $user->id);
            })
            ->where(
                'visited_at',
                '>=',
                now()->subDays(7)
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Devices
        |--------------------------------------------------------------------------
        */

        $devices = LinkVisit::selectRaw("
                device,
                COUNT(*) as total
            ")
            ->whereHas('link', function ($q) use ($user) {

                $q->where('user_id', $user->id);
            })
            ->groupBy('device')
            ->orderByDesc('total')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | OS
        |--------------------------------------------------------------------------
        */

        $os = LinkVisit::selectRaw("
                platform,
                COUNT(*) as total
            ")
            ->whereHas('link', function ($q) use ($user) {

                $q->where('user_id', $user->id);
            })
            ->groupBy('platform')
            ->orderByDesc('total')
            ->get();

        
        /*
        |--------------------------------------------------------------------------
        | Browsers
        |--------------------------------------------------------------------------
        */

        $browsers = LinkVisit::selectRaw("
                browser,
                COUNT(*) as total
            ")
            ->whereHas('link', function ($q) use ($user) {

                $q->where('user_id', $user->id);
            })
            ->groupBy('browser')
            ->orderByDesc('total')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Countries
        |--------------------------------------------------------------------------
        */

        $countries = LinkVisit::selectRaw("
                country,
                COUNT(*) as total
            ")
            ->whereHas('link', function ($q) use ($user) {

                $q->where('user_id', $user->id);
            })
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Cities
        |--------------------------------------------------------------------------
        */

        $cities = LinkVisit::selectRaw("
                city,
                COUNT(*) as total
            ")
            ->whereHas('link', function ($q) use ($user) {

                $q->where('user_id', $user->id);
            })
            ->whereNotNull('city')
            ->groupBy('city')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */

        return response()->json([

            'stats' => [

                'total_links' => $totalLinks,

                'total_clicks' => $totalClicks,

                'clicks_today' => $clicksToday,

                'active_links' => $activeLinks,
            ],

            'recent_links' => $recentLinks,

            'click_chart' => $chart,

            'devices' => $devices,

            'os' => $os,

            'browsers' => $browsers,

            'countries' => $countries,

            'cities' => $cities,
        ]);
    }
}
