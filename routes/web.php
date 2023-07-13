<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

    
