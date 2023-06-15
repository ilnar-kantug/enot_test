<?php

use App\Http\Controllers\Api\Config\ConfirmController;
use App\Http\Controllers\Api\Config\EmailController;
use App\Http\Controllers\Api\Config\SmsController;
use App\Http\Controllers\Api\Config\TelegramController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('config/change')->name('config.change.')->middleware('auth:api')->group(function () {
    Route::post('/request/sms', [SmsController::class, 'request'])->name('sms.request');
    Route::post('/request/email', [EmailController::class, 'request'])->name('email.request');
    Route::post('/request/telegram', [TelegramController::class, 'request'])->name('telegram.request');
    Route::post('/confirm', [ConfirmController::class, 'confirm'])->name('confirm');
});
