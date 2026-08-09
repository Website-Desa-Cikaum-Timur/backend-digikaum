<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/storage/{path}', function ($path) {
    $filePath = storage_path('app/public/' . $path);

    if (! File::exists($filePath)) {
        abort(404);
    }

    return response()->file($filePath);
})->where('path', '.*');
