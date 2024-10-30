<?php

use App\Http\Controllers\Backend\CoachController;
use App\Http\Controllers\Backend\CoachProfileController;
use App\Http\Controllers\Backend\SlotController;
use Illuminate\Support\Facades\Route;

// Routes pour les coachs
Route::middleware(['auth', 'role:coach'])->group(function () {

    // Route vers le tableau de bord du coach
    Route::get('dashboard', [CoachController::class, 'dashboard'])->name('dashboard');

    // Route pour afficher la liste des slots
    Route::get('slots', [SlotController::class, 'index'])->name('slots');
    Route::get('slots/create', [SlotController::class, 'create'])->name('slots.create');
    

    Route::get('profile' , [CoachProfileController::class, 'index'])->name('profile');
    Route::put('profile',[CoachProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile',  [CoachProfileController::class, 'updatePassword'])->name('profile.update.password');

});