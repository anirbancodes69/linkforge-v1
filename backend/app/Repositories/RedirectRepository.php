<?php

namespace App\Repositories;

use App\Models\Link;

class RedirectRepository
{
    public function findActiveLinkByCode(
        string $code
    ): ?Link {

        return Link::where(
                function ($query) use ($code) {

                    $query->where(
                        'short_code',
                        $code
                    )
                    ->orWhere(
                        'custom_alias',
                        $code
                    );
                }
            )
            ->where(
                'is_active',
                true
            )
            ->first();
    }
}