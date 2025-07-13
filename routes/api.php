<?php

use App\Http\Controllers\Auth\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});
Route::group(
    attributes: [
        'as' => 'central_api.',
        'middleware' => ['api','auth:api'],
    ],
    routes: function () {
        Route::group(
            attributes: [
                'as' => 'v1.',
                'prefix' => '/v1',
                'middleware' => [],
            ],
            routes: function () {
                Route::group(
                    attributes: [
                        'as' => 'clients.',
                    ],
                    routes: function () {
                        Route::group(attributes: [], routes: base_path(path: '/routes/api/v1/clients.php'));
                    }
                );
            }
        );
    }
);
