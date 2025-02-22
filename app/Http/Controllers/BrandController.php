<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Afficher toutes les marques
    public function index()
    {
        $brands = Brand::get();
        return view('brands.manage', compact('brands'));
    }

    // Ajouter une nouvelle marque
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Brand::create([
            'nom' => $validatedData['nom'],
        ]);

        return response()->json(['success' => 'Marque ajoutée avec succès.']);
    }

    // Récupérer une marque pour modification
    public function edit(Brand $brand)
    {
        return response()->json(['brand' => $brand]);
    }

    // Mettre à jour une marque
    public function update(Request $request, Brand $brand)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $brand->update([
            'nom' => $validatedData['nom'],
        ]);

        return response()->json(['success' => 'Marque mise à jour.']);
    }

    // Supprimer une marque
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->json(['success' => 'Marque supprimée.']);
    }
}
