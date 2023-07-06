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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Les routes de gestion du panier

Route::get('panier', [App\Http\Controllers\PanierController::class, 'show'])->name('panier.show');
// « panier.show » pour afficher le panier

Route::post('panier/add/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
// « panier.add » pour ajouter ou mettre à jour un produit du panier

Route::get('panier/remove/{article}', [App\Http\Controllers\PanierController::class, 'remove'])->name('panier.remove');
//« panier.remove » pour retirer un produit du panier

Route::get('panier/empty', [App\Http\Controllers\PanierController::class, 'empty'])->name('panier.empty');
//« panier.empty » pour vider les produits du panier

Route::get('/article', function () {
    return view('articles/article');
});

//route pour la page Validation Panier
Route::get('/validation', [App\Http\Controllers\PanierController::class, 'validation'])->name('validation');

