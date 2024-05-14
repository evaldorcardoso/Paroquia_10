<?php

use App\Http\Controllers\CongregationController;
use App\Http\Controllers\UserTokenController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login'])->name('user.login');
    Route::post('token/verify', [UserTokenController::class, 'verify']);
    Route::get('user/{user}/activate/{token}', [UserTokenController::class, 'activate']);
    Route::get('congregations/{congregation}', [CongregationController::class, 'publicShow']);
    Route::prefix('congregation/{congregation}')->group(function () {
        Route::resource('events', EventController::class, ['only' => ['index', 'show']]);
    });
    Route::get('congregations', [CongregationController::class, 'getAll']);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'show']);
    Route::post('user/congregation', [CongregationController::class, 'store']);
    Route::get('user/congregation', [CongregationController::class, 'show']);
    Route::delete('user/congregation', [CongregationController::class, 'destroy']);
    Route::put('user/congregation', [CongregationController::class, 'update']);
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
});
Route::middleware('auth:api')
    ->prefix('congregations/{congregation}')
    ->group(function () {
        Route::resource('events', EventController::class);
    });
