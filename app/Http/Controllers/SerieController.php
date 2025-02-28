<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les marques pour le formulaire
        $brands = Brand::all(['id', 'name']);

        // Récupérer toutes les séries avec leurs marques associées
        $series = Serie::with('brand')->get()
            ->map(function ($serie) {
                return [
                    'id' => $serie->id,
                    'name' => $serie->name,
                    'recipe' => $serie->recipe,
                    'brand' => $serie->brand->name ?? 'Aucune marque', // Afficher le nom de la marque
                ];
            });

        // Retourner la vue avec les données
        return view('series.manage', compact('series', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'recipe' => 'required|integer',
            'brand' => 'required|exists:brands,id',
        ]);

        // Créer une nouvelle série
        Serie::create([
            'name' => $validatedData['name'],
            'recipe' => $validatedData['recipe'],
            'brand_id' => $validatedData['brand'],
        ]);

        // Retourner une réponse JSON
        return response()->json(['success' => 'Série ajoutée avec succès.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serie $serie)
    {
        // Charger la série avec sa marque associée
        $serie->load('brand');

        // Récupérer toutes les marques pour le formulaire
        $brands = Brand::all(['id', 'name']);

        // Retourner les données au format JSON
        return response()->json([
            'serie' => $serie,
            'brands' => $brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serie $serie)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name_e' => 'required|string|max:255',
            'recipe_e' => 'required|integer',
            'brand_e' => 'required|exists:brands,id',
        ]);

        // Mettre à jour la série
        $serie->update([
            'name' => $validatedData['name_e'],
            'recipe' => $validatedData['recipe_e'],
            'brand_id' => $validatedData['brand_e'],
        ]);

        // Retourner une réponse JSON
        return response()->json(['success' => 'Série mise à jour avec succès.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $serie)
    {
        // Supprimer la série
        $serie->delete();

        // Retourner une réponse JSON
        return response()->json(['success' => 'Série supprimée avec succès.']);
    }
}
