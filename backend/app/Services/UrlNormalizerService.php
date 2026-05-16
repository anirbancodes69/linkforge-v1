<?php

namespace App\Services;

class UrlNormalizerService
{
    public function normalize(string $url): string
    {
        $url = trim($url);

        $parts = parse_url($url);

        $scheme = strtolower(
            $parts['scheme'] ?? 'https'
        );

        $host = strtolower(
            $parts['host'] ?? ''
        );

        $path = $parts['path'] ?? '';

        $query = isset($parts['query'])
            ? '?' . $parts['query']
            : '';

        $path = rtrim($path, '/');

        return "{$scheme}://{$host}{$path}{$query}";
    }
}