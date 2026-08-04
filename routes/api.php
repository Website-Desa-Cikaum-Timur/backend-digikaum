<?php

use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\DemographicController;
use App\Http\Controllers\Api\LocationController;
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

    // Modul: WebGIS (Titik Lokasi)
    Route::prefix('locations')->group(function () {
        Route::get('/', [LocationController::class, 'index']);
        Route::get('/{slug}', [LocationController::class, 'show']);
    });

    // Modul: Pengaduan Masyarakat (Admin)
    Route::prefix('complaints')->group(function () {
        Route::post('/', [ComplaintController::class, 'store']);
        Route::get('/track/{trackingCode}', [ComplaintController::class, 'track']);
    });

    // Modul: Sensus Kependudukan (Publik - Terbatas)
    Route::prefix('demographics')->group(function () {
        Route::get('/stats', [DemographicController::class, 'stats']);
        Route::get('/families/{family}', [DemographicController::class, 'show']);
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

        // Modul: WebGIS (CUD)
        Route::prefix('locations')->group(function () {
            Route::post('/', [LocationController::class, 'store']);
            Route::put('/{location}', [LocationController::class, 'update']);
            Route::delete('/{location}', [LocationController::class, 'destroy']);
        });

        // Modul: Pengaduan Masyarakat (Admin)
        Route::prefix('complaints')->group(function () {
            Route::get('/', [ComplaintController::class, 'index']); // Lihat Semua Aduan
            Route::patch('/{complaint}/status', [ComplaintController::class, 'updateStatus']); // Update Status
        });

        // Modul: Sensus Kependudukan (Admin Sensus)
        Route::prefix('demographics')->group(function () {
            Route::post('/families', [DemographicController::class, 'store']);
        });

    });

});