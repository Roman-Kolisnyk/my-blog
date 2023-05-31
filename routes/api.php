<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    LoginController,
    TelegramController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/v1/login', LoginController::class);

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::get('/user/{user}', function (\App\Models\User $user) {
        return $user;
    })->missing(function () {
        return response('Couldn\'t find a user');
    });
});

Route::post('/telegram', [TelegramController::class, 'index']);
