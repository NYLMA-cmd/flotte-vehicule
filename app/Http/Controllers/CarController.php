<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars.manage', compact('cars'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'registration' => 'required|string|max:8',
            'serie_id' => 'required|exists:series,id',
        ]);

        Car::create($validatedData);

        return response()->json(['success' => 'Voiture ajoutée avec succès.']);
    }

    public function edit(Car $car)
    {
        return response()->json(['car' => $car]);
    }

    public function update(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'registration' => 'required|string|max:8',
            'serie_id' => 'required|exists:series,id',
        ]);

        $car->update($validatedData);

        return response()->json(['success' => 'Voiture mise à jour.']);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(['success' => 'Voiture supprimée.']);
    }
}
