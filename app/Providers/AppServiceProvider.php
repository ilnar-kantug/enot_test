<?php

namespace App\Providers;

use App\Http\Controllers\Api\Config\EmailController;
use App\Http\Controllers\Api\Config\SmsController;
use App\Http\Controllers\Api\Config\TelegramController;
use App\Services\CodePushers\Contracts\Pusher;
use App\Services\CodePushers\EmailPusher;
use App\Services\CodePushers\SmsPusher;
use App\Services\CodePushers\TelegramPusher;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(SmsController::class)
            ->needs(Pusher::class)
            ->give(SmsPusher::class);
        $this->app->when(EmailController::class)
            ->needs(Pusher::class)
            ->give(EmailPusher::class);
        $this->app->when(TelegramController::class)
            ->needs(Pusher::class)
            ->give(TelegramPusher::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
