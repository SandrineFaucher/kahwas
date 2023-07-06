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
        //
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
