<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;

class CampagneController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
            // je récupère mes campagnes et les articles associés avec un eager loading
            $campagnes = Campagne::with('articles')
            // je récupère les campagnes dont la date de fin n'est pas antérieure à la date du jour
            ->where('date_fin', ">=", date('y-m-d'))
            ->get();
    
            // je retourne ces infos dans la view campagne pour les afficher
            return view ('campagnes.index', ['campagnes' => $campagnes]);
                        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required|min:10|max:1000',
            'reduction' => 'required|int|min:1|max:2',
            'date_debut'=> 'required|date',
            'date_fin' => 'required|date'
        ]);

        Campagne::create([
            'nom'=> $request->nom,
            'reduction' => $request->reduction,
            'date_debut'=> $request->date_debut,
            'date_fin' => $request->date_fin
        ]);

        return view('backoffice.index')->with('message', 'campagne crée avec succès');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
