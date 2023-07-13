<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gamme;



class ArticleController extends Controller
{

    public function topArticles()
    {
        $articles = Article::where('note', '>=', 4.5)
            ->orderBy('note', 'desc')
            ->get();

        return view('articles/toparticles', ['articles' => $articles]);
    }


    /**
     * Affichage de la page détail article
     */
    public function show(Article $article)
    {
        // on charge les campagnes via un eager loading
        $article->campagne = getCampaign($article->id);


        // on charge les avis via un eager loading
        $article->load('avis');


        return view("articles/show", ['article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'                   => ['required', 'min:4', 'max:30'],
            'description'           => ['required', 'min:10', 'max:50'],
            'description_detaillee' => ['required', 'min:10', 'max:300'],
            'image'                 => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'prix'                  => ['required', 'numeric', 'min:1', 'max:10000'],
            'note'                  => ['required', 'numeric', 'max:5'],
            'stock'                 => ['required', 'numeric', 'min:1', 'max:1000'],
            'gamme_id'              => ['required', 'numeric', 'min:1', 'max:5'],
        ]);

        // Création de l'article
        Article::create([
            'nom'                   => $request->nom,
            'description'           => $request->description,
            'description_detaillee' => $request->description_detaillee,
            'image'                 => isset($request['image']) ? uploadImage($request['image']) : "coffee_profil.png",
            'prix'                  => $request->prix,
            'note'                  => $request->note,
            'stock'                 => $request->stock,
        ]);

        return redirect()->route('backoffice')->with('message', 'Article créé avec succès !');
    }



    public function edit(Article $article, Gamme $gamme)
    {
        return view('articles/edit', ['article' => $article, 'gamme' => $gamme]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Article $article)
    {

        $request->validate([
            'nom'                   => ['required', 'min:4', 'max:30'],
            'description'           => ['required', 'min:10', 'max:50'],
            'description_detaillee' => ['required', 'min:10', 'max:300'],
            'image'                 => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'prix'                  => ['required', 'numeric', 'min:1', 'max:10000'],
            'note'                  => ['required', 'numeric', 'max:50'],
            'stock'                 => ['required', 'numeric', 'min:1', 'max:1000'],
        ]);

        $article->update([
            'nom'                   => $request->nom,
            'description'           => $request->description,
            'description_detaillee' => $request->description_detaillee,
            'image'                 => isset($request['image']) ? uploadImage($request['image']) : $article->image,
            'prix'                  => $request->prix,
            'note'                  => $request->note,
            'stock'                 => $request->stock,
        ]);

        return redirect()->route('backoffice')->with('message', 'Article modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('backoffice')->with('message', 'L\'article a été supprimer avec succès !');
    }
}
