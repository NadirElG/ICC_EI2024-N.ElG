<?php

use App\Http\Controllers\Backend\CoachController;
use Illuminate\Support\Facades\Route;

// Coach Routes
Route::middleware(['auth', 'role:coach'])->group(function () {
    Route::get('coach/dashboard', [CoachController::class, 'dashboard'])->name('coach.dashboard');
});
