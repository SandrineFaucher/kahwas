<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PanierController extends Controller
{
    public function add(Article $article){

        

    }

    public function fraisdeport(Request $request)
    {
        $fraisdeport = $request->input('fraisdeport');
        session()->put('fraisdeport', $fraisdeport);
        return back()->withMessage("Frais de port validés");
    }

}
