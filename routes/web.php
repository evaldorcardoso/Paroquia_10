<?php

use App\Http\Controllers\{
    EventController,
    PlaceController,
    UserController
};
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::any('places/search',[PlaceController::class, 'search'])->name('places.search');
Route::resource('/places', PlaceController::class)->middleware('auth');
Route::resource('/events', EventController::class)->middleware('auth');
Route::any('/events/search',[EventController::class, 'search'])->name('events.search');
Route::resource('/users', UserController::class);
/*
Route::get('places', [PlaceController::class, 'index'])->name('places.index');
Route::get('places/create', [PlaceController::class, 'create'])->name('places.create');
Route::post('places', [PlaceController::class, 'store'])->name('places.store');
*/

/*Route::get('/login', function (){
    return 'login';
})->name('login');*/
Route::redirect('/home', '/users');
Route::get('/', function () {
    return redirect('/users');
});
/*Route::get('/home', function (){
    //return view('admin.pages.places.index');
})->middleware('auth');*/

