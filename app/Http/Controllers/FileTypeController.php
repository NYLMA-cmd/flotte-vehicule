<?php

namespace App\Http\Controllers;

use App\Models\FileType;
use Illuminate\Http\Request;

class FileTypeController extends Controller
{
     // Afficher tous les types de fichiers
     public function index()
     {
         $fileTypes = FileType::get();
         return view('file_types.manage', compact('fileTypes'));
     }

     // Ajouter un nouveau type de fichier
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'validity_period' => 'required|integer',
             'time_unit' => 'required|in:d,w,m,y',
         ]);

         FileType::create($validatedData);

         return response()->json(['success' => 'Type de fichier ajouté avec succès.']);
     }

     // Récupérer un type de fichier pour modification
     public function edit(FileType $fileType)
     {
         return response()->json(['fileType' => $fileType]);
     }

     // Mettre à jour un type de fichier
     public function update(Request $request, FileType $fileType)
     {
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'validity_period' => 'required|integer',
             'time_unit' => 'required|in:d,w,m,y',
         ]);

         $fileType->update($validatedData);

         return response()->json(['success' => 'Type de fichier mis à jour.']);
     }

     // Supprimer un type de fichier
     public function destroy(FileType $fileType)
     {
         $fileType->delete();
         return response()->json(['success' => 'Type de fichier supprimé.']);
     }
}
