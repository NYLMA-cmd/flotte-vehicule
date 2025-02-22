<?php

namespace App\Http\Controllers;

use App\Models\CarFile;
use Illuminate\Http\Request;

class CarFileController extends Controller
{
    // Afficher tous les fichiers de voiture
    public function index()
    {
        $carFiles = CarFile::get();
        return view('car_files.manage', compact('carFiles'));
    }

    // Ajouter un nouveau fichier de voiture
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file_id' => 'required|exists:files,id',
            'car_id' => 'required|exists:cars,id',
        ]);

        CarFile::create($validatedData);

        return response()->json(['success' => 'Fichier de voiture ajouté avec succès.']);
    }

    // Récupérer un fichier de voiture pour modification
    public function edit(CarFile $carFile)
    {
        return response()->json(['carFile' => $carFile]);
    }

    // Mettre à jour un fichier de voiture
    public function update(Request $request, CarFile $carFile)
    {
        $validatedData = $request->validate([
            'file_id' => 'required|exists:files,id',
            'car_id' => 'required|exists:cars,id',
        ]);

        $carFile->update($validatedData);

        return response()->json(['success' => 'Fichier de voiture mis à jour.']);
    }

    // Supprimer un fichier de voiture
    public function destroy(CarFile $carFile)
    {
        $carFile->delete();
        return response()->json(['success' => 'Fichier de voiture supprimé.']);
    }
}
