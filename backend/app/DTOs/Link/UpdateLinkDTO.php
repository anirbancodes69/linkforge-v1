<?php

namespace App\DTOs\Link;

use App\Http\Requests\Link\UpdateLinkRequest;

class UpdateLinkDTO
{
    public function __construct(
        public readonly string $originalUrl,
        public readonly ?string $customAlias,
    ) {}

    public static function fromRequest(
        UpdateLinkRequest $request
    ): self {

        return new self(

            originalUrl: $request->original_url,

            customAlias: $request->custom_alias,

        );
    }
}