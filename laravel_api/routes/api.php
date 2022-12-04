<?php

use App\Http\Controllers\{CongregationController, EventController, PassportAuthController, UserController, UserTokenController};
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
Route::prefix('public')->group(function () {
    Route::post('register', [PassportAuthController::class, 'register']);
    Route::post('login', [PassportAuthController::class, 'login'])->name('user.login');
    Route::post('token/create', [UserTokenController::class, 'create']);
    Route::post('token/verify', [UserTokenController::class, 'verify']);
    Route::get('user/{user}/activate/{token}', [UserTokenController::class, 'activate']);
    Route::get('congregations/{congregation}', [CongregationController::class, 'publicShow']);
    Route::prefix('congregation/{congregation}')->group(function () {
        Route::resource('events', EventController::class);
    });
    Route::get('congregations', [CongregationController::class, 'getAll']);
});
Route::middleware('auth:api')->group(function () {
    Route::get('user', [PassportAuthController::class, 'show']);
    Route::resource('user/congregations', CongregationController::class);
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
});
Route::middleware('auth:api')
    ->prefix('congregations/{congregation}')
    ->group(function () {
        Route::resource('events', EventController::class);
    });
