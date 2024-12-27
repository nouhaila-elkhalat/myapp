<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormulaireController;
use Illuminate\Support\Facades\Route;

// Public route
Route::get('/', function () {
    return view('home');
});

// Authenticated dashboard route
Route::get('/dashboard', function (){
    return view('dashboard');
}) ->name('dashboard');

Route::get('/form', [FormulaireController::class, 'create'])->name('form.index'); // Afficher le formulaire
Route::post('/form', [FormulaireController::class, 'store'])->name('form.store'); // Soumettre le formulaire

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// Profile management for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Authentication routes
require __DIR__.'/auth.php';
