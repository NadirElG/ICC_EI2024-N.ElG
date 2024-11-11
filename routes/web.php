<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PlanController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\CoachRequestController;
use App\Http\Controllers\Frontend\ReservationController;
use App\Http\Controllers\Frontend\SlotController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Gateways\StripeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route for welcome page
Route::get('/', function () {
    return view('welcome');
});

// Public pages
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
    Route::post('/contact-us', [HomeController::class, 'handleContactForm'])->name('handle-contact-form');
    Route::get('/team-coach', [HomeController::class, 'teamCoach'])->name('team-coach');

    // Blog routes
    Route::get('blog', [BlogController::class, 'blog'])->name('blog');
    Route::get('blog-details/{slug}', [BlogController::class, 'blogDetails'])->name('blog-details');
    Route::post('blog-comment', [BlogController::class, 'comment'])->name('blog-comment');

    // Slos routes
    Route::get('/slots', [SlotController::class, 'index'])->name('slots.index');
    Route::get('/slots/{id}', [SlotController::class, 'show'])->name('slots.slot-details');

    Route::post('/slots/{slot}/reserve', [ReservationController::class, 'store'])->name('slots.reserve');




    // Newsletter routes
    Route::post('/newsletter-request', [HomeController::class, 'newsLetterRequest'])->name('newsletter-request');
    Route::get('/newsletter-verify/{token}', [HomeController::class, 'newsLetterEmailVerify'])->name('newsletter-verify');

    // Plans and Wallet recharge routes
    Route::get('/plans', [PlanController::class, 'index'])->name('plans');

    // Stripe payment routes
    Route::post('stripe/payment', [StripeController::class, 'payment'])->name('stripe.payment');
    Route::get('stripe/success', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

    // Profile settings routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('set-language/{lang}', function ($lang) {
        session(['locale' => $lang]);
        return back();
    })->name('set-language');
    
});

// User Dashboard and Profile
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function() {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');
});

// Coach request routes
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function() {
    Route::get('request-coach-form', [CoachRequestController::class, 'index'])->name('request_coach_form');
    Route::post('submit-coach-request', [CoachRequestController::class, 'store'])->name('submit_coach_request');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('slots/{slot}', [ReservationController::class, 'show'])->name('slots.show');
// });




// Authentication routes
require __DIR__.'/auth.php';
