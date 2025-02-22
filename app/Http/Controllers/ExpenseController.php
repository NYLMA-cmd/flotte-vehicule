<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{// Afficher toutes les dépenses
    public function index()
    {
        $expenses = Expense::get();
        return view('expenses.manage', compact('expenses'));
    }

    // Ajouter une nouvelle dépense
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'expense_type_id' => 'required|exists:expense_types,id',
        ]);

        Expense::create($validatedData);

        return response()->json(['success' => 'Dépense ajoutée avec succès.']);
    }

    // Récupérer une dépense pour modification
    public function edit(Expense $expense)
    {
        return response()->json(['expense' => $expense]);
    }

    // Mettre à jour une dépense
    public function update(Request $request, Expense $expense)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'expense_type_id' => 'required|exists:expense_types,id',
        ]);

        $expense->update($validatedData);

        return response()->json(['success' => 'Dépense mise à jour.']);
    }

    // Supprimer une dépense
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return response()->json(['success' => 'Dépense supprimée.']);
    }
}
