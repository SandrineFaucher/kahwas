<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}


class ArticleController extends Article
{
    public function afficherArticles()
    {
        // $articles = Article::all()->latest()->paginate(10);
        // return view('articles', compact('articles'));

        $allArticles = Article::latest()->paginate(20);
        dd($allArticles);

        // return view('articles', compact('articles'));
    }
}

