<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Campagne;
use App\Models\Post;

class HomeController extends Controller
{
    // Function limit 3 cards/articles et les notes du produits
    public function index()
    {
        $promoActuelle = Campagne::where('date_debut', '<=', date('y-m-d')) //Promo actuelle, Date de début de la campagne commencée
            ->where('date_fin', '>=', date('y-m-d')) //Promo actuelle, Date de fin de la campagne et qui ne doit pas être terminée
            ->with('articles', function ($query) { //Je demande a  laravel de récuperer seulement trois articles de la campagne
                $query->limit(3);
            }) //avec eager (rapide) loading je recupere les articles
            ->get();

        $articles = Article::orderBy('note', 'desc')
            ->limit(3)
            ->get();

        //je retourne la vue home en y injectant les posts
        return view('home', [
            'articles' => $articles,
            'promoActuelle' => isset($promoActuelle[0]) ? $promoActuelle[0] : null ,  //[0]<- l'intérêt est de récuperer seulement la promo du moment
        ]);
    }
}
