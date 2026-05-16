<?php

namespace App\Services;

use App\Repositories\DashboardRepository;

class DashboardService
{
    public function __construct(
        protected DashboardRepository $dashboardRepository,
    ) {}

    public function getDashboardData(
        int $userId
    ): array {

        return [

            'stats' => [

                'total_links' => $this->dashboardRepository
                    ->totalLinks($userId),

                'total_clicks' => $this->dashboardRepository
                    ->totalClicks($userId),

                'clicks_today' => $this->dashboardRepository
                    ->clicksToday($userId),

                'active_links' => $this->dashboardRepository
                    ->activeLinks($userId),
            ],

            'recent_links' => $this->dashboardRepository
                ->recentLinks($userId),

            'click_chart' => $this->dashboardRepository
                ->clickChart($userId),

            'devices' => $this->dashboardRepository
                ->devices($userId),

            'browsers' => $this->dashboardRepository
                ->browsers($userId),

            'platforms' => $this->dashboardRepository
                ->platforms($userId),

            'countries' => $this->dashboardRepository
                ->countries($userId),

            'cities' => $this->dashboardRepository
                ->cities($userId),
        ];
    }
}