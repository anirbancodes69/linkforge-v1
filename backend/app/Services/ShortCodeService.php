<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Str;

class ShortCodeService
{
    public function generate(): string
    {
        do {

            $code = Str::random(6);

        } while (

            Link::where(
                'short_code',
                $code
            )->exists()
        );

        return $code;
    }
}