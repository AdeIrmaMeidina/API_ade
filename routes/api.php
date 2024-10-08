<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// route / endpoint kategori
// Route::get('kategori', [KategoriController::class, 'index']);
// Route::post('kategori', [KategoriController::class, 'store']);
// Route::get('kategori/{id}', [KategoriController::class, 'show']);
// Route::put('kategori/{id}', [KategoriController::class, 'update']);
// Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);

// // route / genre
// Route::get('genre', [GenreController::class, 'index']);
// Route::post('genre', [GenreController::class, 'store']);
// Route::get('genre/{id}', [GenreController::class, 'show']);
// Route::put('genre/{id}', [GenreController::class, 'update']);
// Route::delete('genre/{id}', [GenreController::class, 'destroy']);

// // route / actor
// Route::get('actor', [ActorController::class, 'index']);
// Route::post('actor', [ActorController::class, 'store']);
// Route::get('actor/{id}', [ActorController::class, 'show']);
// Route::put('actor/{id}', [ActorController::class, 'update']);
// Route::delete('actor/{id}', [ActorController::class, 'destroy']);


// Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('actor', ActorController::class);
    Route::resource('film', FilmController::class);

// });

// auth route
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);



