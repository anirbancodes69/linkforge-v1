<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\Api\RedirectController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::view('/', 'index')->name('index');

Route::view('/privacy-policy', 'privacy')->name('privacy');

Route::view('/terms-of-service', 'terms')->name('terms');

/*
|--------------------------------------------------------------------------
| Guest
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::prefix('auth')->group(function () {

        Route::view('/login', 'auth.login')->name('login');

        Route::view('/register', 'auth.register')->name('register');
    });

    Route::middleware('throttle:auth')
        ->controller(AuthController::class)
        ->group(function () {

            Route::post('/register', 'register');

            Route::post('/login', 'login');
        });
});

/*
|--------------------------------------------------------------------------
| Public API
|--------------------------------------------------------------------------
*/

Route::prefix('api')
    ->middleware('throttle:short-links')
    ->controller(LinkController::class)
    ->group(function () {

        Route::post('/links', 'store');
    });

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::view('/dashboard', 'dashboard.index')
        ->name('dashboard');

    Route::view('/links', 'links.index')
        ->name('links.index');

    Route::prefix('api')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::controller(LinkController::class)->group(function () {

            Route::get('/links', 'index');

            Route::put('/links/{link}', 'update');

            Route::delete('/links/{link}', 'destroy');
        });

        Route::middleware('admin')
            ->prefix('admin')
            ->controller(AdminDashboardController::class)
            ->group(function () {

                Route::get('/dashboard', 'index');
            });
    });

    Route::middleware('admin')->group(function () {

        Route::view('/admin/dashboard', 'admin.dashboard')
            ->name('admin.dashboard');
    });
});

/*
|--------------------------------------------------------------------------
| Redirect
|--------------------------------------------------------------------------
*/

Route::get('/{code}', RedirectController::class)
    ->where('code', '[A-Za-z0-9_-]+');