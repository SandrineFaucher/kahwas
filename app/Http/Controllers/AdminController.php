<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gamme;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $gammes = Gamme::all();

        // je renvoie la vue admin/index.blade.php en y injectant toutes ces données
        return view('back/index', [
            'gammes' => $gammes,
        ]);
    }
    public function update(Request $request, Gamme $gamme)
    {

        $request->validate([
            //'name de l'input-> [critères]
            'nom' => 'required|min:25|max:1000',
        ]);

        //2) Sauvegarde du message => Va lancer un insert into en SQL
        $gamme->update($request->all());

        //3) On redirige vers l'accueil avec un message de succès
        return redirect()->route('back')->with('message', 'Gamme modifié avec succès');
    }

    public function destroy(Gamme $gamme)
    {

        $gamme->delete();
        return redirect()->route('back')->with('message', 'Gamme supprimée avec succès');
    }
}
