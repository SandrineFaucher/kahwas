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
    return view('welcome');
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
Route::resource('/admin', \App\Http\Controllers\AdminController::class)->except('create', 'show', 'edit', 'update', 'store', 'destroy');

