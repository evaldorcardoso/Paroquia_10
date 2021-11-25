<?php

use App\Http\Controllers\CongregationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::post('token/verify', [UserTokenController::class, 'verify']);
Route::post('token/create', [UserTokenController::class, 'create']);
Route::get('user/{user}/activate/{token}', [UserTokenController::class, 'activate']);
Route::middleware('auth:api')->group(function () {
    Route::resource('congregations', CongregationController::class);
});
Route::middleware('auth:api')
    ->prefix('congregations/{congregation}')
    ->group(function () {
        Route::resource('events', EventController::class);
    });
