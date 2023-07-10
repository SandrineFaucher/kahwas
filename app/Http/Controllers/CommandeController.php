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
    public function create(Commande $commande)
    {
  
    }


    // Assuming this code is within a controller method
public function placecommande(Request $request)
{
    // Step 1: Validation and calculation

    // ... Perform validation and calculation of order details ...

    // Step 2: Create and save the order

    $commande = new Commande();
    $commande->user()->associate(auth()->user());
    $commande->total_amount = $totalapayer;
    $commande->shipping_address_id = session('adresseLivraison')->id;
    $commande->billing_address_id = session('adresseFacturation')->id;
    $commande->save();

    // Step 3: Save commande items

    foreach (session('panier') as $position => $article) {
        $commandeItem = new Commande();
        $commandeItem->commande_id = $commande->id;
        $commandeItem->product_id = $position;
        $commandeItem->quantity = $article['quantite'];
        $commandeItem->price = $article['prix'];
        $commandeItem->save();
    }

    // Step 4: Update product stock (optional)

    // ... Update product stock quantities based on the commande ...

    // Step 5: Redirect or show success message

    return redirect()->route('home')->with('success', 'Votre commande a été validée.');
    /**
     * Store a newly created resource in storage.
     */
}
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
