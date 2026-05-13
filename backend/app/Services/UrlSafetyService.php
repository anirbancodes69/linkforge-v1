<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UrlSafetyService
{
    /*
    |--------------------------------------------------------------------------
    | Allowed URL Schemes
    |--------------------------------------------------------------------------
    */

    private array $allowedSchemes = [
        'http',
        'https',
    ];

    /*
    |--------------------------------------------------------------------------
    | Blocked Domains
    |--------------------------------------------------------------------------
    */

    private array $blockedDomains = [
        'grabify.link',
        'iplogger.org',
        'bit.ly',
        'tinyurl.com',
        'cutt.ly',
    ];

    /*
    |--------------------------------------------------------------------------
    | High Risk TLDs
    |--------------------------------------------------------------------------
    */

    private array $blockedTlds = [
        'zip',
        'review',
        'country',
        'kim',
        'cricket',
    ];

    /*
    |--------------------------------------------------------------------------
    | Blocked Internal Hosts
    |--------------------------------------------------------------------------
    */

    private array $blockedHosts = [
        'localhost',
        '127.0.0.1',
    ];

    /*
    |--------------------------------------------------------------------------
    | Lightweight Sync Checks
    |--------------------------------------------------------------------------
    |
    | Fast local validation.
    | No external API calls.
    | Runs instantly during request lifecycle.
    |
    */

    public function failsLightweightChecks(string $url): bool
    {
        $host = strtolower(
            parse_url($url, PHP_URL_HOST) ?? ''
        );

        $scheme = strtolower(
            parse_url($url, PHP_URL_SCHEME) ?? ''
        );

        /*
        |--------------------------------------------------------------------------
        | Invalid Scheme
        |--------------------------------------------------------------------------
        */

        if (!in_array($scheme, $this->allowedSchemes)) {

            return true;
        }

        /*
        |--------------------------------------------------------------------------
        | IP Address URLs
        |--------------------------------------------------------------------------
        */

        if (
            filter_var(
                $host,
                FILTER_VALIDATE_IP
            )
        ) {

            return true;
        }

        /*
        |--------------------------------------------------------------------------
        | Internal / Local Hosts
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $host,
                $this->blockedHosts
            )
        ) {

            return true;
        }

        /*
        |--------------------------------------------------------------------------
        | Punycode Domains
        |--------------------------------------------------------------------------
        */

        if (str_contains($host, 'xn--')) {

            return true;
        }

        /*
        |--------------------------------------------------------------------------
        | Blocked Domains
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $host,
                $this->blockedDomains
            )
        ) {

            return true;
        }

        /*
        |--------------------------------------------------------------------------
        | Suspicious TLDs
        |--------------------------------------------------------------------------
        */

        $tld = collect(
            explode('.', $host)
        )->last();

        if (
            in_array(
                $tld,
                $this->blockedTlds
            )
        ) {

            return true;
        }

        return false;
    }

    /*
    |--------------------------------------------------------------------------
    | Deep Async Scan
    |--------------------------------------------------------------------------
    |
    | Uses Google Safe Browsing.
    | Should ONLY run in queued jobs.
    |
    */

    public function isMalicious(string $url): bool
    {
        try {

            $response = Http::timeout(10)
                ->post(
                    'https://safebrowsing.googleapis.com/v4/threatMatches:find?key=' .
                    config('services.google.safe_browsing_key'),
                    [
                        'client' => [
                            'clientId' => 'webn',
                            'clientVersion' => '1.0.0',
                        ],

                        'threatInfo' => [

                            'threatTypes' => [
                                'MALWARE',
                                'SOCIAL_ENGINEERING',
                                'UNWANTED_SOFTWARE',
                            ],

                            'platformTypes' => [
                                'ANY_PLATFORM',
                            ],

                            'threatEntryTypes' => [
                                'URL',
                            ],

                            'threatEntries' => [
                                [
                                    'url' => $url,
                                ],
                            ],
                        ],
                    ]
                );

            return !empty(
                $response->json()['matches']
            );

        } catch (\Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | Fail Open
            |--------------------------------------------------------------------------
            |
            | Do not block users if Google API fails.
            | Log issue for monitoring.
            |
            */

            Log::error(
                'Google Safe Browsing scan failed',
                [
                    'url' => $url,
                    'error' => $e->getMessage(),
                ]
            );

            return false;
        }
    }
}