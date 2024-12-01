<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CoachController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PlanController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\CoachRequestController;
use App\Http\Controllers\Frontend\ReservationController;
use App\Http\Controllers\Frontend\SlotController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Gateways\StripeController;
use App\Http\Controllers\Backend\RefundController; // Ajout du RefundController
use Illuminate\Support\Facades\Route;

/*
|------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------------
|
| Routes pour gérer l'ensemble des fonctionnalités de l'application.
|
*/

// Page d'accueil publique
Route::get('/', function () {
    return view('welcome');
});

// Routes accessibles uniquement aux utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Pages principales
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
    Route::post('/contact-us', [HomeController::class, 'handleContactForm'])->name('handle-contact-form');
    Route::get('/team-coach', [HomeController::class, 'teamCoach'])->name('team-coach');

    // Blog
    Route::get('blog', [BlogController::class, 'blog'])->name('blog');
    Route::get('blog-details/{slug}', [BlogController::class, 'blogDetails'])->name('blog-details');
    Route::post('blog-comment', [BlogController::class, 'comment'])->name('blog-comment');

    // Slots
    Route::get('/slots', [SlotController::class, 'index'])->name('slots.index');
    Route::get('/slots/{id}', [SlotController::class, 'show'])->name('slots.slot-details');
    Route::post('/slots/{slot}/reserve', [ReservationController::class, 'store'])->name('slots.reserve');
    Route::get('/slots/{id}/details', [ReservationController::class, 'show'])->name('slots.details');

    // Coaches
    Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');
    Route::get('/coaches/{id}/slots', [CoachController::class, 'slots'])->name('coaches.slots');

    // Newsletter
    Route::post('/newsletter-request', [HomeController::class, 'newsLetterRequest'])->name('newsletter-request');
    Route::get('/newsletter-verify/{token}', [HomeController::class, 'newsLetterEmailVerify'])->name('newsletter-verify');

    // Plans et Wallet
    Route::get('/plans', [PlanController::class, 'index'])->name('plans');

    // Stripe Payment
    Route::post('stripe/payment', [StripeController::class, 'payment'])->name('stripe.payment');
    Route::get('stripe/success', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Changement de langue
    Route::get('set-language/{lang}', function ($lang) {
        session(['locale' => $lang]);
        return back();
    })->name('set-language');
});

// Dashboard utilisateur et profil
Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');
});

// Demande de coach
Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function () {
    Route::get('request-coach-form', [CoachRequestController::class, 'index'])->name('request_coach_form');
    Route::post('submit-coach-request', [CoachRequestController::class, 'store'])->name('submit_coach_request');
});

// Gestion des slots et remboursements pour les coaches
Route::middleware(['auth', 'verified'])->prefix('coach/slots')->name('coach.slots.')->group(function () {
    Route::post('{slot}/cancel', [RefundController::class, 'cancelSlot'])->name('cancel'); // Annulation de slot
    Route::post('{slot}/refund', [RefundController::class, 'refundUsers'])->name('refund'); // Remboursement d'un slot
});



// Authentication
require __DIR__ . '/auth.php';
