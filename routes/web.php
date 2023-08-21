<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SongsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/prueba', [PruebaController::class, 'index']);

Route::resource('/songs', SongsController::class);

Route::get('/songs/{id}/edit', [SongsController::class, 'edit'])->name('songs.edit');
