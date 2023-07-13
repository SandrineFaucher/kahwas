<?php

namespace App\Http\Controllers;

use App\Models\Campagne;
use App\Models\Gamme;
use Illuminate\Http\Request;

class GammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gammes = Gamme::with('articles')->get();
        $promoActuelle = Campagne::where('date_debut', '<=', date('y-m-d')) //Promo actuelle, Date de début de la campagne commencée
            ->where('date_fin', '>=', date('y-m-d')) //Promo actuelle, Date de fin de la campagne et qui ne doit pas être terminée
            ->with('articles', function ($query) { //Je demande a  laravel de récuperer seulement trois articles de la campagne
                $query->limit(3);
            }) //avec eager (rapide) loading je recupere les articles

            ->get();


        //je retourne la vue home en y injectant les posts
        return view('gammes/index', [
            'gammes' => $gammes,
            'promoActuelle' => $promoActuelle[0],  //[0]<- l'intérêt est de récuperer seulement la promo du moment
        ]);
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
    public function store(Request $request) // $request c'est des données qui viennent du formulaire
    {                                      //$request['content'] = "Salut les gars"
        //1) On valide les champs en précisant les critères attendus
        $request->validate([
            //'name de l'input-> [critères]
            'nom' => 'required|min:5|max:100'
        ]);

        //2) Sauvegarde du message => Va lancer un insert into en SQL
        Gamme::create([                                  // 3 syntaxe possibles pour accéder au contenu de $request
            'nom' => $request->nom
        ]);

        //3) On redirige vers l'accueil avec un message de succès
        return redirect()->route('back')->with('message', 'Gamme créée avec succès');
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
    public function edit(Gamme $gamme)
    {
        return view('gammes/edit', ['gamme' => $gamme]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gamme $gamme)
    {
        $request->validate([
            'nom' => 'required|min:5|max:100'
        ]);

        //2) Sauvegarde du message => Va lancer un insert into en SQL
        $gamme->update($request->all());

        //3) On redirige vers l'accueil avec un message de succès
        return redirect()->route('back')->with('message', 'Gamme modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gamme $gamme)
    {
        $gamme->delete();
        return redirect()->route('back')->with('message', 'Gamme supprimée avec succès');
    }
}
