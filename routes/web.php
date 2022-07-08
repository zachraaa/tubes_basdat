<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\jenisMasakanController;
use \App\Http\Controllers\resepController;
use \App\Http\Controllers\penggunaController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('index');
// })->name('dashboard.index');
// Route::resource('reseps', resepController::class);
// Route::resource('jenisMasakans', jenisMasakanController::class);
// Route::resource('penggunas', penggunaController::class);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function(){
    return view('index');
})->name('dashboard.index');
Route::get('/login', function(){
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/', 'App\Http\Controllers\RecipeController@home');
Route::get('/profil', 'App\Http\Controllers\RecipeController@profil');
Route::get('/makanan', 'App\Http\Controllers\RecipeController@makanan');
Route::get('/kalkulator', 'App\Http\Controllers\RecipeController@kalkulator');
Route::get('/watchList', 'App\Http\Controllers\RecipeController@watchList');
Route::get('/list', 'App\Http\Controllers\RecipeController@list');
Route::resource('reseps', resepController::class);
Route::resource('jenisMasakans', jenisMasakanController::class);
Route::resource('penggunas', penggunaController::class);
Route::resource('users', UserController::class);
Route::resource('/reseps', resepController::class);
