<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController; 
use Illuminate\Http\Request;  
use App\User;

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

Auth::routes();

Route::resource('mahasiswas', MahasiswaController::class); 

Route::get('/', 'App\Http\Controllers\MahasiswaController@cari');

Route::get('/users', 'App\Http\Controllers\MahasiswaController@users');

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', [App\Http\Controllers\MahasiswaController::class, 'cari'])->name('search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
