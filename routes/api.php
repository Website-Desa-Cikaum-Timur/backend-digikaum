<?php

use App\Http\Controllers\Api\OfficialController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\PostCategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {

    // === PUBLIC ROUTES ===

    // Modul: Kategori
    Route::prefix('categories')->group(function () {
        Route::get('/', [PostCategoryController::class, 'index']);
        Route::get('/{category}', [PostCategoryController::class, 'show']);
    });

    // Modul: SOTK
    Route::prefix('organizations')->group(function () {
        Route::get('/', [OrganizationController::class, 'index']);
        Route::get('/{organization}', [OrganizationController::class, 'show']);
    });

    Route::prefix('officials')->group(function () {
        Route::get('/{official}', [OfficialController::class, 'show']);
    });

    // Modul: Berita Publikasi
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index']);
        Route::get('/{slug}', [PostController::class, 'show']);
    });

    // === PROTECTED ROUTES ===
    Route::middleware('auth:sanctum')->group(function () {

        // Modul: Kategori (CUD)
        Route::prefix('categories')->group(function () {
            Route::post('/', [PostCategoryController::class, 'store']);
            Route::put('/{category}', [PostCategoryController::class, 'update']);
            Route::delete('/{category}', [PostCategoryController::class, 'destroy']);
        });

        // Modul: SOTK - Organisasi (CUD)
        Route::prefix('organizations')->group(function () {
            Route::post('/', [OrganizationController::class, 'store']);
            Route::put('/{organization}', [OrganizationController::class, 'update']);
            Route::delete('/{organization}', [OrganizationController::class, 'destroy']);
        });

        // Modul: SOTK - Pejabat (CUD)
        Route::prefix('officials')->group(function () {
            Route::post('/', [OfficialController::class, 'store']);
            Route::put('/{official}', [OfficialController::class, 'update']);
            Route::delete('/{official}', [OfficialController::class, 'destroy']);
        });

        // Modul: Berita Publikasi (CUD)
        Route::prefix('posts')->group(function () {
            Route::post('/', [PostController::class, 'store']);
            Route::put('/{post}', [PostController::class, 'update']);
            Route::delete('/{post}', [PostController::class, 'destroy']);
        });

    });

});