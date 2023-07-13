<?php

namespace App\Http\Controllers;

use App\Models\Gamme;



class AdminController extends Controller
{



    public function index()
    {
        $gammes = Gamme::all();

        // je renvoie la vue admin/index.blade.php en y injectant toutes ces données
        return view('back/index', [
            'gammes' => $gammes
        ]);
    }
}
