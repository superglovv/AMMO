<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/create', function () {
    return view('create');
})->middleware(['auth'])->name('create');

Route::get('/', [MovieController::class, "index"])->name("welcome");
Route::post('movies', [MovieController::class, "store"])->name("movies.store");
Route::get('movies/{movie}', [MovieController::class, "show"])->name("movies.show");
Route::patch('movies/{movie}', [MovieController::class, "update"])->name("movies.update");
Route::delete('movies/{movie}', [MovieController::class, "destroy"])->name("movies.destroy");
//Route::post('/rating/{movie}', 'FrontendController@postStar')->name('movieStar');

Route::post('casts', [CastController::class, 'store'])->name('casts.store');
Route::delete('casts/{cast}', [CastController::class, 'destroy'])->name('casts.destroy');

require __DIR__.'/auth.php';
