<?php

namespace App\Jobs;

use App\Models\Link;
use App\Models\LinkVisit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class StoreLinkVisitJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Link $link,
        public string $ipAddress,
        public ?string $userAgent,
        public ?string $referrer,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Agent Detection
        |--------------------------------------------------------------------------
        */

        $agent = new Agent();

        if ($this->userAgent) {

            $agent->setUserAgent($this->userAgent);
        }

        /*
        |--------------------------------------------------------------------------
        | Geo Location
        |--------------------------------------------------------------------------
        */

        $position = Location::get($this->ipAddress);

        /*
        |--------------------------------------------------------------------------
        | Store Visit
        |--------------------------------------------------------------------------
        */

        LinkVisit::create([

            'link_id' => $this->link->id,

            'ip_address' => $this->ipAddress,

            'browser' => $agent->browser(),

            'device' => $this->detectDeviceType($agent),

            'platform' => $agent->platform(),

            'user_agent' => $this->userAgent,

            'referrer' => $this->referrer,

            'visited_at' => now(),

            'country' => $position ? $position->countryName : null,

            'city' => $position ? $position->cityName : null,
        ]);
    }

    /**
     * Detect Device Type
     */
    private function detectDeviceType(Agent $agent): string
    {
        if ($agent->isTablet()) {

            return 'Tablet';
        }

        if ($agent->isMobile()) {

            return 'Mobile';
        }

        if ($agent->isDesktop()) {

            return 'Desktop';
        }

        return 'Other';
    }
}