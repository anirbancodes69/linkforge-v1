<?php

namespace App\Services;

use App\Models\Link;

class GuestLinkMigrationService
{
    public function migrate(?string $guestToken, int $userId): void
    {
        if (!$guestToken) {
            return;
        }

        Link::where('guest_token', $guestToken)
            ->whereNull('user_id')
            ->update([
                'user_id' => $userId,
                'guest_token' => null,
            ]);
    }
}