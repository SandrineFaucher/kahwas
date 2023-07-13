<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;

class AdresseController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'adresse'       => 'required|min:5|max:50',
            'code_postal'   => 'required|min:5|max:5',
            'ville'         => 'required|min:3|max:50',
        ]);

        $adresse = new Adresse;
        $adresse->adresse = $request->input('adresse');
        $adresse->code_postal = $request->input('code_postal');
        $adresse->ville = $request->input('ville');
        $adresse->user_id = $request->input('user_id');

        $adresse->save();

        return redirect()->route('user.edit', Auth::user())->with('message', 'Votre adresse a bien été enregistrée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adresse $adresse)
    {
        $request->validate([
            'adresse'       => 'required|min:5|max:50',
            'code_postal'   => 'required|min:5|max:5',
            'ville'         => 'required|min:3|max:50',
        ]);

        $adresse->adresse = $request->input('adresse');
        $adresse->code_postal = $request->input('code_postal');
        $adresse->ville = $request->input('ville');
        $adresse->user_id = $request->input('user_id');

        $adresse->save();

        return redirect()->route('user.edit', Auth::user())->with('message', 'Votre adresse a bien été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $adresse = Adresse::find($id);
        $adresse->delete();

        return redirect()->route('user.edit', Auth::user())->with('message', 'L\'adresse a été supprimée avec succès');
    }
}
