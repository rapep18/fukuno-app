<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Test route
Route::get('/test', function () {
    return response()->json(['message' => 'API works']);
});

// Protected routes (butuh login)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // hanya admin
    Route::delete('/users/{id}', [AuthController::class, 'deleteUser']);
    Route::patch('/users/{id}/role', [AuthController::class, 'updateRole']);
});
