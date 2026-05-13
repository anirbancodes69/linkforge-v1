<?php

namespace App\Jobs;

use App\Models\Link;
use App\Services\UrlSafetyService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ScanUrlJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Link $link
    ) {}

    public function handle(
        UrlSafetyService $urlSafetyService
    ): void {

        $isMalicious = $urlSafetyService
            ->isMalicious(
                $this->link->original_url
            );

        $this->link->update([

            'safety_status' => $isMalicious
                ? 'malicious'
                : 'safe',

            'scanned_at' => now(),

            'scan_reason' => $isMalicious
                ? 'Detected by Google Safe Browsing'
                : null,
        ]);
    }
}
