<?php

namespace App\DTOs\Auth;

use App\Http\Requests\Auth\RegisterRequest;

class RegisterUserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {}

    public static function fromRequest(RegisterRequest $request): self
    {
        return new self(
            name: $request->name,
            email: $request->email,
            password: $request->password,
        );
    }
}