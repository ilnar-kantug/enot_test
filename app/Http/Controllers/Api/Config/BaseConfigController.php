<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Config;

use App\Http\Controllers\Controller;
use App\Services\ConfigService;
use App\Services\CodePushers\Contracts\Pusher;
use Illuminate\Http\JsonResponse;

class BaseConfigController extends Controller
{
    public function __construct(protected ConfigService $configService, protected Pusher $pusherService)
    {
        //
    }

    public function request(): JsonResponse
    {
        $response = $this->configService->request(auth()->user(), $this->pusherService);
        return response()->json(['message' => $response]);
    }
}
