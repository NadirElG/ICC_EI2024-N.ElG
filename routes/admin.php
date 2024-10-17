<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\UserWalletController; // Ajout de l'import du contrôleur UserWalletController
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

/*Category*/
Route::resource('category', CategoryController::class);

/*User Wallets*/
Route::resource('users-wallets', UserWalletController::class);