<?php

namespace App\Http\Controllers\Api;

use App\DTOs\Auth\LoginUserDTO;
use App\DTOs\Auth\RegisterUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService,
    ) {}

    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    */

    public function register(RegisterRequest $request)
    {
        $response = $this->authService->register(

            RegisterUserDTO::fromRequest($request),

            $request->cookie('guest_token'),
        );

        $request->session()->regenerate();

        return response()->json($response);
    }

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    public function login(LoginRequest $request)
    {
        $response = $this->authService->login(

            LoginUserDTO::fromRequest($request),

            $request->cookie('guest_token'),
        );

        $request->session()->regenerate();

        return response()->json($response);
    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        $response = $this->authService->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json($response);
    }

    /*
    |--------------------------------------------------------------------------
    | Current User
    |--------------------------------------------------------------------------
    */

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}