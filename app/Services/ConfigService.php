<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Config;
use App\Models\User;
use App\Services\CodePushers\Contracts\Pusher;
use Illuminate\Support\Facades\Log;

class ConfigService
{
    public function request(User $user, Pusher $pusherService): string
    {
        try {
            $code = $this->generateCode($user, $pusherService);
            return $pusherService->push($user, $code);
        } catch (\Exception $exception) {
            Log::error('Cannot push request - ' . $exception->getMessage(), ['user' => auth()->user(), 'service' => $pusherService]);
            return 'Something went wrong, try again later';
        }
    }

    public function change(User $user, array $info): string
    {
        $user->load('codes');
        $isValidCode = false;

        foreach ($user->codes as $code) {
            if ($info['service'] === $code->service && (int) $info['code'] === $code->value) {
                $isValidCode = true;
                $code->delete();
            }
        }

        if (!$isValidCode) {
            return 'Code is invalid. Try again.';
        }

        $isUpdated = Config::where('key', $info['key'])
            ->where('user_id', $user->id)
            ->update(['value' => $info['value']]);

        if (!$isUpdated) {
            return 'Config is not updated';
        }

        return 'Config is changed';
    }

    protected function generateCode(User $user, Pusher $pusherService): int
    {
        $code = mt_rand(1000, 9999);
        $user->codes()->create(['value' => $code, 'service' => $pusherService->getName()]);

        return $code;
    }
}
