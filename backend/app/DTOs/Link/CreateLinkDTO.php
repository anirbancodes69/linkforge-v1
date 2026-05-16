<?php

namespace App\DTOs\Link;

use App\Http\Requests\Link\StoreLinkRequest;

class CreateLinkDTO
{
    public function __construct(
        public readonly string $originalUrl,
        public readonly ?string $customAlias,
        public readonly ?int $userId,
        public readonly ?string $guestToken,
    ) {}

    public static function fromRequest(
        StoreLinkRequest $request
    ): self {

        return new self(

            originalUrl: $request->original_url,

            customAlias: $request->custom_alias,

            userId: $request->user()?->id,

            guestToken: $request->cookie('guest_token'),

        );
    }
}