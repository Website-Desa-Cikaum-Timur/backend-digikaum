<?php

use App\Http\Controllers\Api\PostCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route bawaan untuk cek user aktif (Dipertahankan)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ==========================================
// API VERSION 1
// ==========================================
Route::prefix('v1')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PUBLIC ROUTES
    |--------------------------------------------------------------------------
    | Endpoint yang dapat diakses bebas tanpa token login.
    | Digunakan oleh Frontend React untuk konsumsi publik (Warga).
    */

    // Modul: Kategori
    Route::prefix('categories')->group(function () {
        Route::get('/', [PostCategoryController::class, 'index']);
        Route::get('/{category}', [PostCategoryController::class, 'show']);
    });

    // TODO: Modul Publik Lainnya (Berita, Profil Desa, WebGIS) akan diletakkan di sini

    /*
    |--------------------------------------------------------------------------
    | PROTECTED ROUTES
    |--------------------------------------------------------------------------
    | Endpoint yang WAJIB menyertakan Bearer Token (Sanctum).
    | Digunakan oleh Filament Panel / Admin React (Perangkat Desa).
    */
    Route::middleware('auth:sanctum')->group(function () {

        // Modul: Kategori (CUD Operations)
        Route::prefix('categories')->group(function () {
            Route::post('/', [PostCategoryController::class, 'store']);
            Route::put('/{category}', [PostCategoryController::class, 'update']);
            Route::delete('/{category}', [PostCategoryController::class, 'destroy']);
        });

        // TODO: Modul SOTK, UMKM, Pengaduan, dll yang butuh autentikasi akan diletakkan di sini

    });

});
