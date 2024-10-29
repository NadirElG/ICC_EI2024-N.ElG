<?php

use App\Http\Controllers\Backend\CoachController;
use App\Http\Controllers\Backend\CoachProfileController;
use App\Http\Controllers\Backend\SlotController;
use Illuminate\Support\Facades\Route;

// Routes pour les coachs
    Route::middleware(['auth', 'role:coach'])->group(function () {

    // Route vers le tableau de bord du coach
    Route::get('dashboard', [CoachController::class, 'dashboard'])->name('dashboard');

    // Routes pour la gestion des slots
    // Route::prefix('slots')->name('slots.')->group(function () {

    //     // Afficher la liste des slots
    //     Route::get('/', [SlotController::class, 'index'])->name('index');

    //     // Afficher le formulaire de création d'un nouveau slot
    //     Route::get('/create', [SlotController::class, 'create'])->name('create');

    //     // Enregistrer un nouveau slot
    //     Route::post('/', [SlotController::class, 'store'])->name('store');

    //     // Afficher le formulaire d'édition d'un slot existant
    //     Route::get('/{slot}/edit', [SlotController::class, 'edit'])->name('edit');

    //     // Mettre à jour un slot existant
    //     Route::put('/{slot}', [SlotController::class, 'update'])->name('update');

    //     // Supprimer un slot
    //     Route::delete('/{slot}', [SlotController::class, 'destroy'])->name('destroy');
    // });

    Route::get('profile' , [CoachProfileController::class, 'index'])->name('profile');
    Route::put('profile',[CoachProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile',  [CoachProfileController::class, 'updatePassword'])->name('profile.update.password');
    
});
