<?php

namespace App\Services;

use App\DTOs\Auth\LoginUserDTO;
use App\DTOs\Auth\RegisterUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(
        protected GuestLinkMigrationService $guestLinkMigrationService,
    ) {}

    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    */

    public function register(
        RegisterUserDTO $dto,
        ?string $guestToken
    ): array {

        $user = User::create([

            'name' => $dto->name,

            'email' => $dto->email,

            'password' => Hash::make($dto->password),

        ]);

        Auth::login($user);

        $this->guestLinkMigrationService
            ->migrate($guestToken, $user->id);

        return [

            'success' => true,

            'message' => 'Account created successfully',

            'user' => $user,

            'redirect' => $user->is_admin
                ? route('admin.dashboard')
                : route('dashboard'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    public function login(
        LoginUserDTO $dto,
        ?string $guestToken
    ): array {

        if (!Auth::attempt([
            'email' => $dto->email,
            'password' => $dto->password,
        ])) {

            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }

        $user = Auth::user();

        $this->guestLinkMigrationService
            ->migrate($guestToken, $user->id);

        return [

            'success' => true,

            'message' => 'Login successful',

            'user' => $user,

            'redirect' => $user->is_admin
                ? route('admin.dashboard')
                : route('dashboard'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    public function logout(): array
    {
        Auth::logout();

        return [

            'success' => true,

            'message' => 'Logged out successfully',
        ];
    }
}