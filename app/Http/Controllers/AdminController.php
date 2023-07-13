<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gamme;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gammes = Gamme::All();

        $articles = Article::all();

        return view('backoffice/index', ['gammes'=>$gammes, 'articles'=>$articles]);

    }

}
