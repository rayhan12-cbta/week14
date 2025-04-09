<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    // Blog Routes
    Route::apiResource('blogs', BlogController::class);
    Route::get('/blogs/slug/{slug}', [BlogController::class, 'showBySlug']);

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout']);
});
