<?php

namespace App\Repositories;

use App\Models\Link;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LinkRepository
{
    public function paginateByUser(
        int $userId,
        int $perPage
    ): LengthAwarePaginator {

        return Link::where('user_id', $userId)
            ->latest()
            ->paginate($perPage);
    }

    public function findDuplicate(
        string $originalUrl,
        ?int $userId,
        ?string $guestToken
    ): ?Link {

        return Link::query()

            ->where(
                'original_url',
                $originalUrl
            )

            ->where(
                'is_active',
                true
            )

            ->where(function ($query) use (
                $userId,
                $guestToken
            ) {

                if ($userId) {

                    $query->where(
                        'user_id',
                        $userId
                    );

                    return;
                }

                $query->where(
                    'guest_token',
                    $guestToken
                );
            })

            ->latest()

            ->first();
    }
}