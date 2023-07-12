<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class CampagneController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // je récupère mes campagnes et les articles associés avec un eager loading
        $campagnes = Campagne::with('articles')
            // je récupère les campagnes dont la date de fin n'est pas antérieure à la date du jour
            ->where('date_fin', ">=", date('y-m-d'))
            ->get();

        // je retourne ces infos dans la view campagne pour les afficher
        return view('campagnes.index', ['campagnes' => $campagnes]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Campagne $campagne)
    {

        //validation des données à créer
        $request->validate([
            'nom' => 'required|min:10|max:1000',
            'reduction' => 'required|numeric|min:1|max:100',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date'

        ]);

        //transmission des données dans la bdd
        // et récupération à la fois de cette campagne dans une variable
        $campagne = Campagne::create([
            'nom' => $request->nom,
            'reduction' => $request->reduction,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin

        ]);

        for ($i = 1; $i <= Article::count(); $i++) {

            //je vérifie avec une condition si la check box article a été cochée
            if ($request->input('articleId' . $i)) {
                $campagne->articles()->attach($i);
            }
        }

        return redirect()->route('admin')->with('message', 'campagne crée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campagne $campagne)
    {
        $articles = Article::all();

        //Je récupère mes campagnes dans le ficher backoffice/edit pour 
        //pouvoir les modifier 
        return view('backoffice.edit', [
            'campagne' => $campagne,
            'articles' => $articles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campagne $campagne)
    {
        //validation des données à modifier
        $request->validate([
            'nom' => 'required|min:10|max:1000',
            'reduction' => 'required|numeric|min:1|max:100',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date'
        ]);

        //transmission des données dans la bdd
        // $campagne->update([
        //     'nom' => $request->nom,
        //     'reduction' => $request->reduction,
        //     'date_debut' => $request->date_debut,
        //     'date_fin' => $request->date_fin

        // ]);
        // syntaxe simplifiée de l'update
        $campagne->update($request->all());

        // Eager loading pour charger les articles liés à la campagne 
        $campagne->load('articles');

        //on les retire ensuite de la table intermédiaire
        foreach ($campagne->articles as $article) {
            $campagne->articles()->detach($article);
        }
        // for ($i = 1; $i <= Article::count(); $i++) {

        //     //je vérifie avec une condition si la check box article a été cochée
        //     if ($request->input('articleId' . $i)) {
        //         $campagne->articles()->attach($i);
        //     }
        // }

        //autre syntaxe de rattachement 
        foreach (Article::all() as $article) {
            if (isset($request['articleId' . $article->id])) {
                $campagne->articles()->attach($article->id);
            }
        }

        return redirect()->route('admin')->with('message', 'Votre campagne a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campagne $campagne)
    {
        //si je suis l'admin connecté
        // (vérification admin avec gate dans la navbar)
        if (Auth::user()->id) {
            $campagne->delete(); // je supprime la campagne
            return redirect()->route('admin')->with('message', 'la campagne a bien été supprimée');
        } else {
            return redirect()->route('admin')->withErrors(['erreur' => 'suppression de la campagne impossible']);
        }
    }
}
