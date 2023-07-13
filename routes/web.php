<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampagneController;
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


//***********************Route d'affichage  de la page home**********************************/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//*******************Route pour les méthodes du controller Campagne**************************/
Route::resource('/campagnes', \App\Http\Controllers\CampagneController::class);



//************************Route pour l'ajout au panier **************************************/
Route::post('panier/add/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');


//*****************Route pour les méthodes du Controller favoris*****************************/
Route::resource('/favoris', \App\Http\Controllers\FavoriController::class)->except('create', 'show', 'update', 'edit');


//****************Route pour la gestion des commandes et leur détail*************************/
Route::resource('/commandes', \App\Http\Controllers\CommandeController::class,);

//*******************Route pour la gestion du back-office************************************/
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');

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



Route::post('panier/add/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
