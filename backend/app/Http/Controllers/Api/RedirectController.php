<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RedirectService;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __construct(
        protected RedirectService $redirectService,
    ) {}

    public function __invoke(
        Request $request,
        string $code
    ) {

        return $this->redirectService
            ->handle(
                $request,
                $code
            );
    }
}