<?php

namespace App\Repositories;

use App\Models\Link;
use App\Models\LinkVisit;
use App\Models\User;
use Illuminate\Support\Collection;

class AdminDashboardRepository
{
    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    public function totalUsers(): int
    {
        return User::count();
    }

    public function todayUsers(): int
    {
        return User::whereDate(
            'created_at',
            today()
        )->count();
    }

    /*
    |--------------------------------------------------------------------------
    | Links
    |--------------------------------------------------------------------------
    */

    public function totalLinks(): int
    {
        return Link::count();
    }

    public function todayLinks(): int
    {
        return Link::whereDate(
            'created_at',
            today()
        )->count();
    }

    public function guestLinks(): int
    {
        return Link::whereNull('user_id')
            ->count();
    }

    public function registeredLinks(): int
    {
        return Link::whereNotNull('user_id')
            ->count();
    }

    /*
    |--------------------------------------------------------------------------
    | Clicks
    |--------------------------------------------------------------------------
    */

    public function totalClicks(): int
    {
        return LinkVisit::count();
    }

    public function todayClicks(): int
    {
        return LinkVisit::whereDate(
            'visited_at',
            today()
        )->count();
    }

    /*
    |--------------------------------------------------------------------------
    | Top Links
    |--------------------------------------------------------------------------
    */

    public function topLinks(
        int $limit = 10
    ): Collection {

        return Link::select(
                'id',
                'short_code',
                'custom_alias',
                'clicks_count'
            )
            ->orderByDesc('clicks_count')
            ->take($limit)
            ->get();
    }
}