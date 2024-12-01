<?php

use App\Http\Controllers\Backend\CoachController;
use App\Http\Controllers\Backend\CoachProfileController;
use App\Http\Controllers\Backend\SlotController;
use App\Http\Controllers\Backend\RefundController; // Ajout du contrôleur RefundController
use App\Http\Controllers\Backend\WithdrawalController;
use Illuminate\Support\Facades\Route;

// Routes pour les coachs
Route::middleware(['auth', 'role:coach'])->group(function () {

    // Route vers le tableau de bord du coach
    Route::get('dashboard', [CoachController::class, 'dashboard'])->name('dashboard');

    // Routes pour les slots
    Route::get('slots', [SlotController::class, 'index'])->name('slots.index'); // Liste des slots
    Route::get('slots/create', [SlotController::class, 'create'])->name('slots.create'); // Formulaire de création
    Route::post('slots', [SlotController::class, 'store'])->name('slots.store'); // Enregistrement du slot
    Route::get('slots/{slot}/edit', [SlotController::class, 'edit'])->name('slots.edit'); // Formulaire de modification
    Route::put('slots/{slot}', [SlotController::class, 'update'])->name('slots.update'); // Mise à jour du slot
    Route::delete('slots/{slot}', [SlotController::class, 'destroy'])->name('slots.destroy'); // Suppression du slot
    Route::get('withdrawal', [WithdrawalController::class, 'create'])->name('withdrawal.create');
    Route::post('withdrawal', [WithdrawalController::class, 'store'])->name('withdrawal.store');
    // Routes pour le profil
    Route::get('profile', [CoachProfileController::class, 'index'])->name('profile');
    Route::put('profile', [CoachProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [CoachProfileController::class, 'updatePassword'])->name('profile.update.password');

});
