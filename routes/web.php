<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('brands', BrandsController::class);
Route::resource('car-expenses', CarExpenseController::class);
Route::resource('car-files', CarFileController::class);
Route::resource('cars', CarsController::class);
Route::resource('expense-types', ExpenseTypesController::class);
Route::resource('expenses', ExpensesController::class);
Route::resource('file-types', FileTypesController::class);
Route::resource('files', FilesController::class);
Route::resource('series', SeriesController::class);

require __DIR__.'/auth.php';
