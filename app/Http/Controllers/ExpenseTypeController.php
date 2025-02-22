<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    // Afficher tous les types de dépenses
    public function index()
    {
        $expenseTypes = ExpenseType::get();
        return view('expense_types.manage', compact('expenseTypes'));
    }

    // Ajouter un nouveau type de dépense
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExpenseType::create($validatedData);

        return response()->json(['success' => 'Type de dépense ajouté avec succès.']);
    }

    // Récupérer un type de dépense pour modification
    public function edit(ExpenseType $expenseType)
    {
        return response()->json(['expenseType' => $expenseType]);
    }

    // Mettre à jour un type de dépense
    public function update(Request $request, ExpenseType $expenseType)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $expenseType->update($validatedData);

        return response()->json(['success' => 'Type de dépense mis à jour.']);
    }

    // Supprimer un type de dépense
    public function destroy(ExpenseType $expenseType)
    {
        $expenseType->delete();
        return response()->json(['success' => 'Type de dépense supprimé.']);
    }
}
