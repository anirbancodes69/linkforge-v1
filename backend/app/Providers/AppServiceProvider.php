<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Force HTTPS In Production
        |--------------------------------------------------------------------------
        */

        if (app()->environment('production')) {

            URL::forceScheme('https');
        }

        /*
        |--------------------------------------------------------------------------
        | Authentication Rate Limiter
        |--------------------------------------------------------------------------
        */

        RateLimiter::for('auth', function (Request $request) {

            return Limit::perMinute(10)
                ->by($request->ip());
        });

        /*
        |--------------------------------------------------------------------------
        | Public Link Creation Rate Limiter
        |--------------------------------------------------------------------------
        */

        RateLimiter::for('short-links', function (Request $request) {

            return Limit::perMinute(30)
                ->by($request->ip());
        });
    }
}
