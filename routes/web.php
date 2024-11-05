<?php

use App\Http\Controllers\Frontend\CoachRequestController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Frontend\HomeController;  // Import HomeController

use App\Http\Controllers\Frontend\PlanController;  // Import PlanControlle
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Gateways\StripeController;  // Import PlanController




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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/home' , [HomeController::class, 'index'])->name('home');
    Route::post('/newsletter-request', [HomeController::class,'newsLetterRequest'])->name('newsletter-request');
    Route::get('/newsletter-verify/{token}', [HomeController::class,'newsLetterEmailVerify'])->name('newsletter-verify');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/plans' , [PlanController::class, 'index'])->name('plans');

    Route::post('stripe/payment',[StripeController::class , 'payment'])->name('stripe.payment');
    Route::get('stripe/success',[StripeController::class , 'success'])->name('stripe.success');
    Route::get('stripe/cancel',[StripeController::class , 'cancel'])->name('stripe.cancel');
});

Route::group(['middleware' => ['auth','verified'], 'prefix' => 'user', 'as' => 'user.' ], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile',[UserProfileController::class, 'index'])->name('profile');
    Route::put('profile',[UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile',  [UserProfileController::class, 'updatePassword'])->name('profile.update.password');
});

Route::group(['middleware' => ['auth','verified'], 'prefix' => 'user', 'as' => 'user.' ], function(){
    Route::get('request-coach-form', [CoachRequestController::class, 'index'])->name('request_coach_form');
    Route::post('submit-coach-request', [CoachRequestController::class, 'store'])->name('submit_coach_request');
});





require __DIR__.'/auth.php';



