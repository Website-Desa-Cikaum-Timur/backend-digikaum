<?php

use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\DemographicController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\OfficialController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\PostCategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('/', [PostCategoryController::class, 'index']);
        Route::get('/{category}', [PostCategoryController::class, 'show']);
    });

    Route::prefix('organizations')->group(function () {
        Route::get('/', [OrganizationController::class, 'index']);
        Route::get('/{organization}', [OrganizationController::class, 'show']);
    });

    Route::prefix('officials')->group(function () {
        Route::get('/{official}', [OfficialController::class, 'show']);
    });

    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index']);
        Route::get('/{slug}', [PostController::class, 'show']);
    });

    Route::prefix('locations')->group(function () {
        Route::get('/', [LocationController::class, 'index']);
        Route::get('/{slug}', [LocationController::class, 'show']);
    });

    Route::prefix('complaints')->group(function () {
        Route::post('/', [ComplaintController::class, 'store']);
        Route::get('/track/{trackingCode}', [ComplaintController::class, 'track']);
    });

    Route::prefix('demographics')->group(function () {
        Route::get('/stats', [DemographicController::class, 'stats']);
        Route::get('/families/{family}', [DemographicController::class, 'show']);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{product}', [ProductController::class, 'show']);
    });

    Route::prefix('galleries')->group(function () {
        Route::get('/', [GalleryController::class, 'index']);
        Route::get('/years', [GalleryController::class, 'availableYears']);
        Route::get('/{gallery}', [GalleryController::class, 'show']);
    });

    Route::middleware('auth:sanctum')->group(function () {

        Route::prefix('categories')->group(function () {
            Route::post('/', [PostCategoryController::class, 'store']);
            Route::put('/{category}', [PostCategoryController::class, 'update']);
            Route::delete('/{category}', [PostCategoryController::class, 'destroy']);
        });

        Route::prefix('organizations')->group(function () {
            Route::post('/', [OrganizationController::class, 'store']);
            Route::put('/{organization}', [OrganizationController::class, 'update']);
            Route::delete('/{organization}', [OrganizationController::class, 'destroy']);
        });

        Route::prefix('officials')->group(function () {
            Route::post('/', [OfficialController::class, 'store']);
            Route::put('/{official}', [OfficialController::class, 'update']);
            Route::delete('/{official}', [OfficialController::class, 'destroy']);
        });

        Route::prefix('posts')->group(function () {
            Route::post('/', [PostController::class, 'store']);
            Route::put('/{post}', [PostController::class, 'update']);
            Route::delete('/{post}', [PostController::class, 'destroy']);
        });

        Route::prefix('locations')->group(function () {
            Route::post('/', [LocationController::class, 'store']);
            Route::put('/{location}', [LocationController::class, 'update']);
            Route::delete('/{location}', [LocationController::class, 'destroy']);
        });

        Route::prefix('complaints')->group(function () {
            Route::get('/', [ComplaintController::class, 'index']);
            Route::patch('/{complaint}/status', [ComplaintController::class, 'updateStatus']);
        });

        Route::prefix('demographics')->group(function () {
            Route::post('/families', [DemographicController::class, 'store']);
        });

        Route::prefix('products')->group(function () {
            Route::post('/', [ProductController::class, 'store']);
            Route::put('/{product}', [ProductController::class, 'update']);
            Route::delete('/{product}', [ProductController::class, 'destroy']);
        });

        Route::prefix('galleries')->group(function () {
            Route::post('/', [GalleryController::class, 'store']);
            Route::put('/{gallery}', [GalleryController::class, 'update']);
            Route::delete('/{gallery}', [GalleryController::class, 'destroy']);
        });

    });

});
