<?php

namespace App\Http\Controllers;

use App\Models\CarExpense;
use Illuminate\Http\Request;

class CarExpenseController extends Controller
{
     // Afficher toutes les dépenses de voiture
     public function index()
     {
         $carExpenses = CarExpense::get();
         return view('car_expenses.manage', compact('carExpenses'));
     }

     // Ajouter une nouvelle dépense de voiture
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'expense_id' => 'required|exists:expenses,id',
             'car_id' => 'required|exists:cars,id',
             'date' => 'required|date',
             'amount' => 'required|integer',
             'distance' => 'required|numeric',
         ]);

         CarExpense::create($validatedData);

         return response()->json(['success' => 'Dépense de voiture ajoutée avec succès.']);
     }

     // Récupérer une dépense de voiture pour modification
     public function edit(CarExpense $carExpense)
     {
         return response()->json(['carExpense' => $carExpense]);
     }

     // Mettre à jour une dépense de voiture
     public function update(Request $request, CarExpense $carExpense)
     {
         $validatedData = $request->validate([
             'expense_id' => 'required|exists:expenses,id',
             'car_id' => 'required|exists:cars,id',
             'date' => 'required|date',
             'amount' => 'required|integer',
             'distance' => 'required|numeric',
         ]);

         $carExpense->update($validatedData);

         return response()->json(['success' => 'Dépense de voiture mise à jour.']);
     }

     // Supprimer une dépense de voiture
     public function destroy(CarExpense $carExpense)
     {
         $carExpense->delete();
         return response()->json(['success' => 'Dépense de voiture supprimée.']);
     }
}
