<?php

declare(strict_types=1);

namespace App\Services\CodePushers;

use App\Models\User;
use App\Services\CodePushers\Contracts\Pusher;

class TelegramPusher implements Pusher
{
    public function getName(): string
    {
        return 'telegram';
    }

    public function push(User $user, int $code): string
    {
        //set up service and push
        return 'pushed via telegram: ' . $code;
    }
}
