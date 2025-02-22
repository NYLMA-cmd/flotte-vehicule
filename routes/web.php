<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarExpenseController;
use App\Http\Controllers\CarFileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FileTypeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SerieController;
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

Route::resource('brands', BrandController::class);
Route::resource('car-expenses', CarExpenseController::class);
Route::resource('car-files', CarFileController::class);
Route::resource('cars', CarController::class);
Route::resource('expense-types', ExpenseTypeController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('file-types', FileTypeController::class);
Route::resource('files', FileController::class);
Route::resource('series', SerieController::class);

require __DIR__.'/auth.php';
