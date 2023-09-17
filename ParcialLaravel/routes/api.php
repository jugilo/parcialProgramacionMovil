<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Rutas para el controlador de géneros
Route::resource('genres', 'GenreController');

// Rutas para el controlador de bandas
Route::resource('bands', 'BandController');

// Rutas para el controlador de álbumes
Route::resource('albums', 'AlbumController');

Route::get('genres/pdf', 'GenreController@generatePDF');
Route::get('bands/pdf', 'BandController@generatePDF');
Route::get('albums/pdf', 'AlbumController@generatePDF');


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
