<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ********** Articles ***********

Route::resource('articles', App\Http\Controllers\ArticleController::class)->except('create');


// ********** Gamme ***********

Route::resource('gammes', App\Http\Controllers\GammeController::class)->except('create');

// ********** backoffice ***********
Route::get('back', [app\Http\Controllers\AdminController::class])->name('back');


// ********** 404 page ***********

// Les autres routes avant

// Méthode fallback() en dernière position
Route::fallback(function () {
    return view('404'); // la vue 404.blade.php
});
