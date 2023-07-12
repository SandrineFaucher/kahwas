<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gamme;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // on renvoie la vue articles/index (catalogue) 
        // on y injecte la liste des articles, que l'on récupère simultanément
        return view('articles/index', [
            'articles' => Article::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // on met en place un validateur avec les critères attendus
        $request->validate([
            'nom' => 'required|string|min:5|max:30',
            'description' => 'required|min:10|max:100',
            'description_detaillee' => 'required|min:50|max:500',
            'image' => 'required|min:5|max:25',
            'prix' => 'required',
            'stock' => 'required',
            'note' => 'required',
            'gamme_id' => 'required'
        ]);

        // on sauvegarde l'article en base de données en se basant sur les champs du formulaire
        Article::create($request->all());

        // on redirige vers l'accueil du back-office
        return redirect()->route('admin.index')->with('message', 'Article créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Article $article)
    {
        $article->load('avis.user');
        $article->load(['campagnes' => function ($query) {
            $query->whereDate('date_debut', '<=', date('Y-m-d')) 
                ->whereDate('date_fin', '>=', date('Y-m-d')); 
        }]);

        return view('articles/show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Article $article)
    {

        return view('articles/edit', [
            'article' => $article,
            'gammes' => Gamme::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, Article $article)
    {

        $request->validate([
            'nom' => 'required|min:5|max:30',
            'description' => 'required|min:10|max:100',
            'description_detaillee' => 'required|min:50|max:500',
            'image' => 'required|min:5|max:25',
            'prix' => 'required',
            'stock' => 'required',
            'gamme_id' => 'required'
        ]);


        $article->update($request->except('_token'));
        return redirect()->route('admin.index')->with('message', 'Article modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.index')->with('message', 'L\'article a bien été supprimé');
    }
}
