<?php

namespace App\Http\Controllers\Api;

use App\DTOs\Link\CreateLinkDTO;
use App\DTOs\Link\UpdateLinkDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Link\StoreLinkRequest;
use App\Http\Requests\Link\UpdateLinkRequest;
use App\Models\Link;
use App\Services\LinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function __construct(
        protected LinkService $linkService,
    ) {}

    /*
    |--------------------------------------------------------------------------
    | List User Links
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 10);

        $links = $this->linkService->index(
            $request->user()->id,
            $perPage
        );

        return response()->json($links);
    }

    /*
    |--------------------------------------------------------------------------
    | Store Link
    |--------------------------------------------------------------------------
    */

    public function store(StoreLinkRequest $request)
    {
        $response = $this->linkService->store(
            CreateLinkDTO::fromRequest($request)
        );

        return response()
            ->json(
                $response,
                $response['status'] ?? 200
            )
            ->cookie(
                'guest_token',
                $request->cookie('guest_token')
                    ?? Str::uuid()->toString(),
                60 * 24 * 30
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Link
    |--------------------------------------------------------------------------
    */

    public function update(
        UpdateLinkRequest $request,
        Link $link
    ) {

        $this->authorize('update', $link);

        $response = $this->linkService->update(
            $link,
            UpdateLinkDTO::fromRequest($request)
        );

        return response()->json(
            $response,
            $response['status'] ?? 200
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Link
    |--------------------------------------------------------------------------
    */

    public function destroy(Link $link)
    {
        $this->authorize('delete', $link);

        return response()->json(
            $this->linkService->destroy($link)
        );
    }
}