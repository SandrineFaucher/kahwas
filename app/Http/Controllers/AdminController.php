<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campagnes = Campagne::all();
        $articles = Article::all();


        return view('backoffice.index', [
            'campagnes' => $campagnes,
            'articles' => $articles
        ] );
    }

    
    
   
}
