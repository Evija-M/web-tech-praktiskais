<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});


Auth::routes();
//authentication routes
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::post('register',[App\Http\Controllers\Auth\RegisterController::class, 'store']);
Route::post('logout',[App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//
Route::get('artists', [ArtistController::class, 'index'])->name('artists');
Route::get('artist/create', [ArtistController::class, 'create'])->name('artist.create');
Route::post('artist/store', [ArtistController::class, 'store'])->name('artist.store');
Route::get('artist/show', [ArtistController::class, 'show'])->name('artist.show');
