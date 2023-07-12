<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gamme;
use Illuminate\Http\Request;

class BackController extends Controller
{
    public function index()
    {
        $gammes = Gamme::all();

        // je renvoie la vue admin/index.blade.php en y injectant toutes ces données
        return view('admin/index', [
            'gammes' => $gammes,
        ]);
    }
}
