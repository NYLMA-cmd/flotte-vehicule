<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    // Afficher toutes les séries
    public function index()
    {
        $series = Series::get();
        return view('series.manage', compact('series'));
    }

    // Ajouter une nouvelle série
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'recipe' => 'required|integer',
            'brand_id' => 'required|exists:brands,id',
        ]);

        Series::create($validatedData);

        return response()->json(['success' => 'Série ajoutée avec succès.']);
    }

    // Récupérer une série pour modification
    public function edit(Series $series)
    {
        return response()->json(['series' => $series]);
    }

    // Mettre à jour une série
    public function update(Request $request, Series $series)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'recipe' => 'required|integer',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $series->update($validatedData);

        return response()->json(['success' => 'Série mise à jour.']);
    }

    // Supprimer une série
    public function destroy(Series $series)
    {
        $series->delete();
        return response()->json(['success' => 'Série supprimée.']);
    }
}
