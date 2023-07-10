<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\User;
use App\Models\Adresse;

class PanierController extends Controller
{

	# Affichage du panier
	public function show()
	{
		return view("panier.show"); // resources\views\panier\show.blade.php
	}


	# Ajout d'un produit au panier
	public function add(Article $article, Request $request)
	{
		// Validation de la requête
		$this->validate($request, [
			"quantite" => "numeric|min:1"
		]);

		$campagneActuelle = getCampaign($article->id); //on récupère son éventuelle campagne en cours (sinon => null)
		$panier = session()->get("panier"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$article_details = [
			'nom' => $article->nom,
			'prix' => $article->prix,
			'quantite' => $request->quantite
		];

		// si l'article est concerné par une promo ET si celle-ci est en cours => on prend en compte sa réduction
		if ($campagneActuelle !== null) {
			$article_details['campagne'] = $campagneActuelle;
		}

		$panier[$article->id] = $article_details; // On ajoute ou on met à jour le produit au panier
		session()->put("panier", $panier); // On enregistre le panier

		// Redirection vers le panier avec un message
		return redirect()->route("panier.show")->withMessage("Produit ajouté au panier");
	}


	// Suppression d'un produit du panier
	public function remove(Article $article)
	{
		$panier = session()->get("panier"); // On récupère le panier en session
		unset($panier[$article->id]); // On supprime le produit du tableau $panier
		session()->put("panier", $panier); // On enregistre le panier

		// Redirection vers le panier
		return back()->withMessage("Produit retiré du panier");
	}


	// Vider le panier
	public function empty()
	{
		session()->forget("panier"); // On supprime le panier en session

		// Redirection vers le panier
		return back()->withMessage("Panier vidé");
	}


	public function validation(Request $request)
	{
		$user = User::find(auth()->user()->id);

		// si je viens de choisir une adresse de livraison 
		if (($request->adresseLivraisonId)) {
			$adresseLivraisonId = $request->adresseLivraisonId; // je stocke l'id de cette adresse choisie
			$adresseLivraison = Adresse::findOrFail($adresseLivraisonId); // je récupère en bdd l'adresse correspondante
			session(['adresseLivraison' => $adresseLivraison]); // je la stocke dans la session
			// autre syntaxe : session()->put('adresseLivraison' => $adresseLivraison);
		}

		// si je viens de choisir une adresse de facturation => même principe 
		if (($request->adresseFacturationId)) {
			$adresseFacturationId = $request->input('adresseFacturationId');
			$adresseFacturation = Adresse::findOrFail($adresseFacturationId);
			session(['adresseFacturation' => $adresseFacturation]);
		}

		return view("panier/validation", ['user' => $user]);
	}


	public function fraisdeport(Request $request)
	{
		$fraisdeport = $request->input('fraisdeport');
		session()->put('fraisdeport', $fraisdeport);
		return back()->withMessage("Frais de port validés");
	}

	public function totalapayer(Request $request)
	{
		$totalapayer = $request->input('totalapayer');
		session()->put('totalapayer', $totalapayer);
	}

}
