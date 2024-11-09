<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogCommentController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubscribersController;
use App\Http\Controllers\Backend\UserWalletController; // Ajout de l'import du contrôleur UserWalletController
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

/*Category*/
Route::resource('category', CategoryController::class);

/*Blog*/
Route::resource('blog', BlogController::class);
Route::get('blog-comments' , [BlogCommentController::class , 'index'])->name('blog-comments.index');
Route::delete('blog-comments/{id}/destroy', [BlogCommentController::class, 'destroy'])->name('blog-comments.destroy');


Route::resource('blog-category', BlogCategoryController::class);
Route::put('admin/blog-category/{id}', [BlogCategoryController::class, 'update'])->name('admin.blog-category.update');

/*User Wallets*/
Route::resource('users-wallets', UserWalletController::class);

/*Subscribers route*/
Route::get('subscribers', [SubscribersController::class, 'index'])->name('subscribers.index');
Route::delete('subscribers/{id}', [SubscribersController::class, 'destroy'])->name('subscribers.destroy');
Route::post('subscribers-send-mail' , [SubscribersController::class, 'sendMail'])->name('subscribers-send-mail');