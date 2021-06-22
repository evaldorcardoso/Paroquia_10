<?php

use App\Http\Controllers\{
    PlaceController
};
use Illuminate\Support\Facades\Route;

Route::resource('places',PlaceController::class);
/*
Route::get('places', [PlaceController::class, 'index'])->name('places.index');
Route::get('places/create', [PlaceController::class, 'create'])->name('places.create');
Route::post('places', [PlaceController::class, 'store'])->name('places.store');
*/

Route::get('/login', function (){
    return 'login';
})->name('login');

Route::get('/', function () {
    return view('app');
});

