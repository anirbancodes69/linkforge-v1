<?php

namespace App\Repositories;

use App\Models\Link;
use App\Models\LinkVisit;
use Illuminate\Support\Collection;

class DashboardRepository
{
    /*
    |--------------------------------------------------------------------------
    | Total Links
    |--------------------------------------------------------------------------
    */

    public function totalLinks(int $userId): int
    {
        return Link::where(
            'user_id',
            $userId
        )->count();
    }

    /*
    |--------------------------------------------------------------------------
    | Total Clicks
    |--------------------------------------------------------------------------
    */

    public function totalClicks(int $userId): int
    {
        return Link::where(
            'user_id',
            $userId
        )->sum('clicks_count');
    }

    /*
    |--------------------------------------------------------------------------
    | Clicks Today
    |--------------------------------------------------------------------------
    */

    public function clicksToday(int $userId): int
    {
        return LinkVisit::whereHas(
            'link',
            fn ($q) => $q->where(
                'user_id',
                $userId
            )
        )
        ->whereDate(
            'visited_at',
            today()
        )
        ->count();
    }

    /*
    |--------------------------------------------------------------------------
    | Active Links
    |--------------------------------------------------------------------------
    */

    public function activeLinks(int $userId): int
    {
        return Link::where(
            'user_id',
            $userId
        )
        ->where(
            'is_active',
            true
        )
        ->count();
    }

    /*
    |--------------------------------------------------------------------------
    | Recent Links
    |--------------------------------------------------------------------------
    */

    public function recentLinks(
        int $userId,
        int $limit = 5
    ): Collection {

        return Link::where(
            'user_id',
            $userId
        )
        ->latest()
        ->take($limit)
        ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Click Chart
    |--------------------------------------------------------------------------
    */

    public function clickChart(
        int $userId
    ): Collection {

        return LinkVisit::selectRaw("
                DATE(visited_at) as date,
                COUNT(*) as clicks
            ")
            ->whereHas(
                'link',
                fn ($q) => $q->where(
                    'user_id',
                    $userId
                )
            )
            ->where(
                'visited_at',
                '>=',
                now()->subDays(7)
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Devices
    |--------------------------------------------------------------------------
    */

    public function devices(
        int $userId
    ): Collection {

        return LinkVisit::selectRaw("
                device,
                COUNT(*) as total
            ")
            ->whereHas(
                'link',
                fn ($q) => $q->where(
                    'user_id',
                    $userId
                )
            )
            ->groupBy('device')
            ->orderByDesc('total')
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Browsers
    |--------------------------------------------------------------------------
    */

    public function browsers(
        int $userId
    ): Collection {

        return LinkVisit::selectRaw("
                browser,
                COUNT(*) as total
            ")
            ->whereHas(
                'link',
                fn ($q) => $q->where(
                    'user_id',
                    $userId
                )
            )
            ->groupBy('browser')
            ->orderByDesc('total')
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Platforms
    |--------------------------------------------------------------------------
    */

    public function platforms(
        int $userId
    ): Collection {

        return LinkVisit::selectRaw("
                platform,
                COUNT(*) as total
            ")
            ->whereHas(
                'link',
                fn ($q) => $q->where(
                    'user_id',
                    $userId
                )
            )
            ->groupBy('platform')
            ->orderByDesc('total')
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Countries
    |--------------------------------------------------------------------------
    */

    public function countries(
        int $userId,
        int $limit = 5
    ): Collection {

        return LinkVisit::selectRaw("
                country,
                COUNT(*) as total
            ")
            ->whereHas(
                'link',
                fn ($q) => $q->where(
                    'user_id',
                    $userId
                )
            )
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderByDesc('total')
            ->take($limit)
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Cities
    |--------------------------------------------------------------------------
    */

    public function cities(
        int $userId,
        int $limit = 5
    ): Collection {

        return LinkVisit::selectRaw("
                city,
                COUNT(*) as total
            ")
            ->whereHas(
                'link',
                fn ($q) => $q->where(
                    'user_id',
                    $userId
                )
            )
            ->whereNotNull('city')
            ->groupBy('city')
            ->orderByDesc('total')
            ->take($limit)
            ->get();
    }
}