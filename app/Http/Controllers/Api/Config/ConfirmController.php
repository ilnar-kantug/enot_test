<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmRequest;
use App\Services\ConfigService;
use App\Services\CodePushers\Contracts\Pusher;
use Illuminate\Http\JsonResponse;

class ConfirmController extends Controller
{
    public function __construct(protected ConfigService $configService)
    {
        //
    }

    public function confirm(ConfirmRequest $request): JsonResponse
    {
        $response = $this->configService->change(auth()->user(), $request->all());
        return response()->json(['message' => $response]);
    }
}
