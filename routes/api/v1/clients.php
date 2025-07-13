<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'clients'], function ($router) {
    Route::controller(ClientController::class)->group(function () {
        Route::post(uri: '/', action: 'store')->name(name: 'store');

        Route::prefix('/{client}')->group(function () {
            Route::get(uri: '/', action: 'show')->name(name: 'show');

            Route::patch(uri: '/', action: 'update')->name(name: 'update');

            Route::delete(uri: '/', action: 'delete')->name(name: 'destroy');
        });
    });
});
