<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('home');
});


Auth::routes();


// Route  "HOME"
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route  "/"
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route  "USER"
Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
Route::put('/user/updatepassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatepassword');


// Route “ARTICLES“  --> RESOURCE 
Route::resource('/articles', App\Http\Controllers\ArticleController::class);



// Route “TOPARTICLE“  --> GET
Route::get('/toparticles', [App\Http\Controllers\ArticleController::class, 'topArticles'])->name('toparticles');



// Route  "ADRESSE"
Route::resource('/adresse', App\Http\Controllers\AdresseController::class)->except('index', 'create', 'edit');



// Route “BACKOFFICE“
Route::get('/backoffice', [App\Http\Controllers\AdminController::class, 'index'])->name('backoffice');

