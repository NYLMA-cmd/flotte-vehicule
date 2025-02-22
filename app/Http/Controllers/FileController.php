<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
     // Afficher tous les fichiers
     public function index()
     {
         $files = File::get();
         return view('files.manage', compact('files'));
     }

     // Ajouter un nouveau fichier
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'url' => 'required|string|max:255',
             'subscription_date' => 'required|date',
             'file_type_id' => 'required|exists:file_types,id',
         ]);

         File::create($validatedData);

         return response()->json(['success' => 'Fichier ajouté avec succès.']);
     }

     // Récupérer un fichier pour modification
     public function edit(File $file)
     {
         return response()->json(['file' => $file]);
     }

     // Mettre à jour un fichier
     public function update(Request $request, File $file)
     {
         $validatedData = $request->validate([
             'url' => 'required|string|max:255',
             'subscription_date' => 'required|date',
             'file_type_id' => 'required|exists:file_types,id',
         ]);

         $file->update($validatedData);

         return response()->json(['success' => 'Fichier mis à jour.']);
     }

     // Supprimer un fichier
     public function destroy(File $file)
     {
         $file->delete();
         return response()->json(['success' => 'Fichier supprimé.']);
     }
}
