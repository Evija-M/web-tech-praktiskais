<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LanguageController;
use App\Models\Artist;
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

Route::resource('artists', ArtistController::class);
Route::resource('albums', AlbumController::class);
Route::resource('songs', SongController::class);
//Route::resource('genres', GenreController::class);
//authentication routes
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::post('register',[App\Http\Controllers\Auth\RegisterController::class, 'store']);
Route::post('logout',[App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Artist controller
Route::get('artists', [ArtistController::class, 'index'])->name('artists');
Route::get('artists/create', [ArtistController::class, 'create'])->name('artists.create');
Route::post('artists/store', [ArtistController::class, 'store'])->name('artists.store');
Route::get('artists/show/{id}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('artists/edit/{id}', [ArtistController::class, 'edit'])->name('artists.edit');
Route::post('artists/update', [ArtistController::class, 'update'])->name('artists.update');
Route::delete('artists/destroy/{id}', [ArtistController::class, 'destroy'])->name('artists.destroy');
Route::get('artists/genre/{genre_id}', [GenreController::class, 'artistsGenre'])->name('artists.genre');


//Album controller
Route::get('albums', [AlbumController::class, 'index'])->name('albums');
Route::get('albums/create/{artist}', [AlbumController::class, 'create'])->name('albums.create');
Route::post('albums/store', [AlbumController::class, 'store'])->name('albums.store');
Route::get('albums/show/{album_id}', [AlbumController::class, 'show'])->name('albums.show');
Route::post('albums/rate', [AlbumController::class, 'rate']);
Route::get('albums/edit/{album_id}', [AlbumController::class, 'edit'])->name('albums.edit');
Route::post('albums/update', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('albums/destroy/{id}', [AlbumController::class, 'destroy'])->name('albums.destroy');

//Song controller
Route::get('songs', [SongController::class, 'index'])->name('songs');
Route::get('songs/create/{album}', [SongController::class, 'create'])->name('songs.create');
Route::post('songs/store', [SongController::class, 'store'])->name('songs.store');
Route::get('songs/show/{song_id}', [SongController::class, 'show'])->name('songs.show');
Route::get('songs/edit/{song_id}', [SongController::class, 'edit'])->name('songs.edit');
Route::post('songs/update', [SongController::class, 'update'])->name('songs.update');
Route::delete('songs/destroy/{song_id}', [SongController::class, 'destroy'])->name('songs.destroy');

//Genre controller
Route::get('genres', [GenreController::class, 'index'])->name('genres');

Route::get('lang/{locale}',LanguageController::class); 

Route::get('users', [UserController::class, 'index'])->name('users')->middleware('admin');


Route::get('comments/show/{album_id}', [CommentController::class, 'show']);
Route::post('comments/store', [CommentController::class, 'store']);


