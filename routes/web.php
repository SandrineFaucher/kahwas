<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CampagneController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GammeController;

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


Auth::routes();

// Route  "/"
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//***********************Route d'affichage  de la page home**********************************/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route  "USER"
Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
Route::put('/user/updatepassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatepassword');



//*******************Route pour les méthodes du controller Campagne**************************/
Route::resource('/campagnes', CampagneController::class);

//*****************Route pour les méthodes du Controller favoris*****************************/
Route::resource('/favoris', \App\Http\Controllers\FavoriController::class)->except('create', 'show', 'update', 'edit');



// **************** Les routes de gestion du panier **************** //

Route::get('panier', [App\Http\Controllers\PanierController::class, 'show'])->name('panier.show');
// « panier.show » pour afficher le panier

Route::post('panier/add/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
// « panier.add » pour ajouter ou mettre à jour un produit du panier

Route::get('panier/remove/{article}', [App\Http\Controllers\PanierController::class, 'remove'])->name('panier.remove');
//« panier.remove » pour retirer un produit du panier

Route::get('panier/empty', [App\Http\Controllers\PanierController::class, 'empty'])->name('panier.empty');
//« panier.empty » pour vider les produits du panier



// *************** Les routes de la page Validation Panier *********** //

Route::get('/validation', [App\Http\Controllers\PanierController::class, 'validation'])->name('validation')->middleware('auth');
// 'validation' pour afficher la page validation

Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
//valider les modifications d'informations personnelles

Route::post('cart/validation', [App\Http\Controllers\PanierController::class, 'validation'])->name('cart.validation');
// valider choix d'adresse de livraison ou de facturation

Route::post('validation/fraisdeport', [App\Http\Controllers\PanierController::class, 'fraisdeport'])->name('fraisdeport');
// 'fraisdeport' pour afficher le formulaire frais de port

Route::get('/emptyAfterOrder', [App\Http\Controllers\PanierController::class, 'emptyAfterOrder'])->name('emptyAfterOrder');
// pour vider le panier après validation de la commande



// ******************* Les routes de la page Commandes **************** //

Route::resource('/commandes', App\Http\Controllers\CommandeController::class)->except('create', 'store', 'edit', 'update', 'destroy');

Route::get('/sauvegardeCommande', [App\Http\Controllers\CommandeController::class, 'store'])->name('commandes.store');
// 'store' pour sauvegarder la commande en BDD après validation de la commande



// ******************* Les routes ressources Articles **************** //

Route::resource('/articles', ArticleController::class);

// Route “TOPARTICLE“  --> GET
Route::get('/toparticles', [App\Http\Controllers\ArticleController::class, 'topArticles'])->name('toparticles');


// ******************* Les routes ressources Gammes **************** //

Route::resource('/gammes', GammeController::class);


//*******************Route pour la gestion du back-office************************************/
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');


// Route  "ADRESSE"
Route::resource('/adresse', App\Http\Controllers\AdresseController::class)->except('index', 'create', 'edit');


// Les autres routes avant

// Méthode fallback() en dernière position
Route::fallback(function () {
    return view('404'); // la vue 404.blade.php
});


