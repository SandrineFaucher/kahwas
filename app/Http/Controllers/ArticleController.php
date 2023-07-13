<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Campagne;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promoActuelle = Campagne::where('date_debut', '<=', date('y-m-d')) //Promo actuelle, Date de début de la campagne commencée
            ->where('date_fin', '>=', date('y-m-d')) //Promo actuelle, Date de fin de la campagne et qui ne doit pas être terminée
            ->with('articles', function ($query) { //Je demande a  laravel de récuperer seulement trois articles de la campagne
                $query->limit(3);
            }) //avec eager (rapide) loading je recupere les articles

            ->get();


        $articles = Article::orderBy('note', 'desc')
            ->get();



        //je retourne la vue home en y injectant les posts
        return view('articles/index', [
            'articles' => $articles,
            'promoActuelle' => $promoActuelle[0],  //[0]<- l'intérêt est de récuperer seulement la promo du moment
        ]);
    }
    // public function catalogue()
    // {
    //     $articles = Article::
    //     $posts = Post::all();
    //     dd($posts);
    // }


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
    public function show(string $id)
    {
        //
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
