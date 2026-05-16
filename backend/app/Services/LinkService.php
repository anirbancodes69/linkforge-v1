<?php

namespace App\Services;

use App\DTOs\Link\CreateLinkDTO;
use App\DTOs\Link\UpdateLinkDTO;
use App\Jobs\ScanUrlJob;
use App\Models\Link;
use App\Repositories\LinkRepository;

class LinkService
{
    public function __construct(
        protected UrlNormalizerService $urlNormalizerService,
        protected UrlSafetyService $urlSafetyService,
        protected ShortCodeService $shortCodeService,
        protected LinkRepository $linkRepository,
    ) {}

    /*
    |--------------------------------------------------------------------------
    | List Links
    |--------------------------------------------------------------------------
    */

    public function index(
        int $userId,
        int $perPage
    ) {
        return $this->linkRepository
            ->paginateByUser($userId, $perPage);
    }

    /*
    |--------------------------------------------------------------------------
    | Store Link
    |--------------------------------------------------------------------------
    */

    public function store(
        CreateLinkDTO $dto
    ): array {

        $normalizedUrl = $this->urlNormalizerService
            ->normalize($dto->originalUrl);

        /*
        |--------------------------------------------------------------------------
        | Lightweight Security Checks
        |--------------------------------------------------------------------------
        */

        if (
            $this->urlSafetyService
                ->failsLightweightChecks($normalizedUrl)
        ) {

            return [
                'success' => false,
                'message' => 'Unsafe destination URL detected.',
                'status' => 422,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Reserved Alias Protection
        |--------------------------------------------------------------------------
        */

        if (
            $dto->customAlias &&
            in_array(
                strtolower($dto->customAlias),
                config('reserved_aliases')
            )
        ) {

            return [
                'success' => false,
                'message' => 'Alias is reserved.',
                'status' => 422,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Deduplication
        |--------------------------------------------------------------------------
        */

        if (!$dto->customAlias) {

            $existingLink = $this->linkRepository
                ->findDuplicate(
                    $normalizedUrl,
                    $dto->userId,
                    $dto->guestToken
                );

            if ($existingLink) {

                return [

                    'success' => true,

                    'message' => 'Existing short link returned.',

                    'link' => $existingLink,

                    'short_url' => url(
                        $existingLink->custom_alias
                            ??
                            $existingLink->short_code
                    ),
                ];
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Create Link
        |--------------------------------------------------------------------------
        */

        $link = Link::create([

            'user_id' => $dto->userId,

            'guest_token' => $dto->userId
                ? null
                : $dto->guestToken,

            'original_url' => $normalizedUrl,

            'short_code' => $this->shortCodeService
                ->generate(),

            'custom_alias' => $dto->customAlias,

            'safety_status' => 'pending',
        ]);

        ScanUrlJob::dispatch($link);

        return [

            'success' => true,

            'message' => 'Link created successfully.',

            'link' => $link,

            'short_url' => url(
                $link->custom_alias
                    ??
                    $link->short_code
            ),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Update Link
    |--------------------------------------------------------------------------
    */

    public function update(
        Link $link,
        UpdateLinkDTO $dto
    ): array {

        $normalizedUrl = $this->urlNormalizerService
            ->normalize($dto->originalUrl);

        $urlChanged = (
            $link->original_url !== $normalizedUrl
        );

        /*
        |--------------------------------------------------------------------------
        | Lightweight Security Checks
        |--------------------------------------------------------------------------
        */

        if (
            $this->urlSafetyService
                ->failsLightweightChecks($normalizedUrl)
        ) {

            return [
                'success' => false,
                'message' => 'Unsafe destination URL detected.',
                'status' => 422,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Reserved Alias Protection
        |--------------------------------------------------------------------------
        */

        if (
            $dto->customAlias &&
            in_array(
                strtolower($dto->customAlias),
                config('reserved_aliases')
            )
        ) {

            return [
                'success' => false,
                'message' => 'Alias is reserved.',
                'status' => 422,
            ];
        }

        $link->update([

            'original_url' => $normalizedUrl,

            'custom_alias' => $dto->customAlias,

            'safety_status' => $urlChanged
                ? 'pending'
                : $link->safety_status,
        ]);

        if ($urlChanged) {

            ScanUrlJob::dispatch($link);
        }

        return [

            'success' => true,

            'message' => 'Link updated successfully.',

            'link' => $link,

            'short_url' => url(
                $link->custom_alias
                    ??
                    $link->short_code
            ),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Link
    |--------------------------------------------------------------------------
    */

    public function destroy(Link $link): array
    {
        $link->delete();

        return [

            'success' => true,

            'message' => 'Link deleted successfully.',
        ];
    }
}