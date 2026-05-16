<?php

namespace App\Services;

use App\Repositories\AdminDashboardRepository;

class AdminDashboardService
{
    public function __construct(
        protected AdminDashboardRepository $adminDashboardRepository,
    ) {}

    public function index(): array
    {
        return [

            'users' => [

                'total' => $this->adminDashboardRepository
                    ->totalUsers(),

                'today' => $this->adminDashboardRepository
                    ->todayUsers(),
            ],

            'links' => [

                'total' => $this->adminDashboardRepository
                    ->totalLinks(),

                'today' => $this->adminDashboardRepository
                    ->todayLinks(),

                'guest_links' => $this->adminDashboardRepository
                    ->guestLinks(),

                'registered_links' => $this->adminDashboardRepository
                    ->registeredLinks(),
            ],

            'clicks' => [

                'total' => $this->adminDashboardRepository
                    ->totalClicks(),

                'today' => $this->adminDashboardRepository
                    ->todayClicks(),
            ],

            'top_links' => $this->adminDashboardRepository
                ->topLinks(),
        ];
    }
}