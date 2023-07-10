<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Je récupère le user connecté dans une variable
        $user = User::find(Auth::user()->id); 

        //je récupère les commandes de mon user connecté dans une variable 
        $user->load('commandes');

                      
        // Autre façon pour récupérer la commande du user connecté
        //$commandes = Commande::where('user_id', '=', Auth::user()->id)->get();
   

        //je retourne les commandes associées au user dans la vue commandes/index
        return view('commandes.index', ['user' => $user]);

    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
       //je charge les articles de la commande
       //grace à Models/Commande qui lie cette table par la FK à la table articles
        $commande->load('articles');

        // je les retourne dans une page de détail et j'injecte les données de ma variable "$commande"
        // avec la fonction compact('commande')
        return view('commandes.detail', compact('commande'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
