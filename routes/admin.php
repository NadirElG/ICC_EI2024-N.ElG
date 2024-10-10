<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;


use Illuminate\Support\Facades\Route;

// Admin Routes
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

    Route::get('/users', [AdminController::class, 'showUsers'])->name('users');
    Route::put('/users/{user}/status', [AdminController::class, 'updateUserStatus'])->name('users.updateStatus');

    /*Category*/
    Route::resource('category', CategoryController::class);
