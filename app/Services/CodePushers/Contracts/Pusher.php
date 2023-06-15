<?php

declare(strict_types=1);

namespace App\Services\CodePushers\Contracts;

use App\Models\User;

interface Pusher
{
    public function getName(): string;
    public function push(User $user, int $code): string;
}
