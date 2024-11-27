<?php

use App\Http\Controllers\Api\SlotController;
use App\Http\Controllers\Backend\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Endpoint pour récupérer l'utilisateur authentifié
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Préfixe pour versionner les APIs (v1)
Route::prefix('v1')->group(function () {

    // Routes protégées pour les slots (nécessite authentification via Sanctum)
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('slots', [SlotController::class, 'indexForApi']);
        Route::get('slots/{id}', [SlotController::class, 'showForApi']);
    });

    // Routes protégées pour les blogs (nécessite authentification via Sanctum)
    Route::middleware('auth:sanctum')->group(function () {
        // CRUD pour les blogs
        Route::get('blogs', [BlogController::class, 'getBlogsForApi']);
        Route::get('blogs/{id}', [BlogController::class, 'getBlogForApiWithId']);
        Route::post('blogs', [BlogController::class, 'storeBlogForApi']);
        Route::put('blogs/{id}', [BlogController::class, 'updateBlogForApi']);
        Route::delete('blogs/{id}', [BlogController::class, 'deleteBlogForApi']);
    });

});
