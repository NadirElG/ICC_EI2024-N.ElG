<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Backend\AdminController;  // Import AdminController
use App\Http\Controllers\Backend\CoachController;  // Import CoachController


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

/* Previous route for dashboard
Route::get('/dashboard', function () {
    return view('frontend.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home' , [HomeController::class, 'index'])->name('home');
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


require __DIR__.'/auth.php';



