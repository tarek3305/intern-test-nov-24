<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('upload');
});

Route::get('/images', [\App\Http\Controllers\ImageController::class, 'index'])->name('images.index');
Route::post('/images', [\App\Http\Controllers\ImageController::class, 'store'])->name('images.store');
