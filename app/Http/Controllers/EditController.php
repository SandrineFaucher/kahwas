<?php

namespace App\Http\Controllers;

use App\Models\Gamme;
use Illuminate\Http\Request;

class editController extends Controller
{

    public function update(Request $request, Gamme $gamme)
    {
        $request->validate([
            'nom' => 'required|min:5|max:100'
        ]);

        //2) Sauvegarde du message => Va lancer un insert into en SQL
        $gamme->update($request->all());

        //3) On redirige vers l'accueil avec un message de succès
        return redirect()->route('back')->with('message', 'Gamme modifié avec succès');
    }
}
