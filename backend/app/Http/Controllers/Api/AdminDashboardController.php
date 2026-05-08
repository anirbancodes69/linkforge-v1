<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\LinkVisit;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return response()->json([

            'users' => [

                'total' => User::count(),

                'today' => User::whereDate(
                    'created_at',
                    today()
                )->count(),
            ],

            'links' => [

                'total' => Link::count(),

                'today' => Link::whereDate(
                    'created_at',
                    today()
                )->count(),

                'guest_links' => Link::whereNull('user_id')
                    ->count(),

                'registered_links' => Link::whereNotNull('user_id')
                    ->count(),
            ],

            'clicks' => [

                'total' => LinkVisit::count(),

                'today' => LinkVisit::whereDate(
                    'visited_at',
                    today()
                )->count(),
            ],

            'top_links' => Link::select(
                    'id',
                    'short_code',
                    'custom_alias',
                    'clicks_count'
                )
                ->orderByDesc('clicks_count')
                ->take(10)
                ->get(),
        ]);
    }
}
