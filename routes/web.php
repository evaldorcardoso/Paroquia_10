<?php

use App\Http\Controllers\{
    EventController,
    PlaceController
};
use Illuminate\Support\Facades\Route;

Route::any('places/search',[PlaceController::class, 'search'])->name('places.search');
Route::resource('/places', PlaceController::class)->middleware('auth');
Route::resource('/events', EventController::class)->middleware('auth');
Route::any('/events/search',[EventController::class, 'search'])->name('events.search');
/*
Route::get('places', [PlaceController::class, 'index'])->name('places.index');
Route::get('places/create', [PlaceController::class, 'create'])->name('places.create');
Route::post('places', [PlaceController::class, 'store'])->name('places.store');
*/

/*Route::get('/login', function (){
    return 'login';
})->name('login');*/
Route::redirect('/home', '/events')->middleware('auth');
Route::get('/', function () {
    return view('app');
});
/*Route::get('/home', function (){
    //return view('admin.pages.places.index');
})->middleware('auth');*/

