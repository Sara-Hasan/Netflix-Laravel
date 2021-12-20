<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
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

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/', function () {
//     return view('movies.index');
// });
Route::resource('movies', MoviesController::class);
Route::resource('movies', 'App\Http\Controllers\MoviesController');

