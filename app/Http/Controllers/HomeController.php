<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
    // Function limit 3 et les notes du produits
    public function index()
    {
        $articles = Article::orderBy('note', 'desc')
            ->limit(3)
            ->get();
        //je retourne la vue home en y injectant les posts
        return view('home', ['articles' => $articles]);
    }

    public function request()
    {
        $campagnes_articles = Article::orderBy('note', 'desc')
        ->limit(3)
            ->allowPromotionCodes()
            ->checkout('prix');
            return view('home', ['articles' => $campagnes_articles]);
    }
}