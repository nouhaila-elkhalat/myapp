<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormulaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

// Public route
Route::get('/', function () {
    return view('home');
});

//dashboard route
Route::get('/dashboard', function (){
    return view('dashboard');
}) ->name('dashboard');
Route::post('/dashboard', [FormulaireController::class, 'store'])->name('dashboard.store'); // Envoyer le formulaire

  //liste route
  Route::resource('formulaires', FormulaireController::class);

// Admin route
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
