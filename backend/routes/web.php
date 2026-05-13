<?php

use App\Http\Controllers\Api\AdminDashboardController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\Api\RedirectController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::view('/', 'index')->name('index');

Route::view('/privacy-policy', 'privacy')->name('privacy');
Route::view('/terms-of-service', 'terms')->name('terms');

Route::view('/pricing', 'pricing.index')->name('pricing');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/




Route::middleware('guest')->group(function () {

    Route::prefix('auth')->group(function () {

        Route::view('/login', 'auth.login')
            ->name('login');

        Route::view('/register', 'auth.register')
            ->name('register');
    });

    Route::middleware('throttle:auth')->group(function () {

        Route::post('/register', [AuthController::class, 'register']);

        Route::post('/login', [AuthController::class, 'login']);
    });
});

Route::middleware('throttle:short-links')->prefix('api')->group(function () {
    Route::post('/links', [LinkController::class, 'store']);
});
/*
|--------------------------------------------------------------------------
| Protected SaaS Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Account Management
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::view('/dashboard', 'dashboard.index')
        ->name('dashboard');

    Route::prefix('api')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });

    Route::prefix('api/admin')->group(function () {

        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )->middleware('admin');
    });

    Route::middleware(['admin'])->prefix('admin')->group(function () {

        Route::view('/dashboard', 'admin.dashboard')
            ->name('admin.dashboard');
    });


    /*
    |--------------------------------------------------------------------------
    | Links
    |--------------------------------------------------------------------------
    */

    Route::prefix('links')->group(function () {

        Route::view('/', 'links.index')
            ->name('links.index');
    });

    Route::prefix('api')->group(function () {

        Route::get('/links', [LinkController::class, 'index']);

        Route::put('/links/{link}', [LinkController::class, 'update']);

        Route::delete('/links/{link}', [LinkController::class, 'destroy']);
    });

    /*
    |--------------------------------------------------------------------------
    | Analytics
    |--------------------------------------------------------------------------
    */

    Route::prefix('analytics')->group(function () {

        Route::view('/', 'analytics.index')
            ->name('analytics.index');
    });

    /*
    |--------------------------------------------------------------------------
    | QR Codes
    |--------------------------------------------------------------------------
    */

    Route::prefix('qr')->group(function () {

        Route::view('/', 'qr.index')
            ->name('qr.index');
    });

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    Route::prefix('settings')->group(function () {

        Route::view('/', 'settings.index')
            ->name('settings.index');
    });

    /*
    |--------------------------------------------------------------------------
    | API Documentation
    |--------------------------------------------------------------------------
    */

    Route::view('/api-docs', 'docs.index')
        ->name('docs.index');
});



/*
|--------------------------------------------------------------------------
| Error Preview Routes (Optional)
|--------------------------------------------------------------------------
*/

Route::view('/404-preview', 'errors.404');

Route::view('/500-preview', 'errors.500');

Route::view('/maintenance-preview', 'errors.maintenance');

Route::get('/{code}', RedirectController::class)
    ->where('code', '[A-Za-z0-9_-]+');
