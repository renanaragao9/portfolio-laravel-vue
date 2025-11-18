<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DonorProfileController;
use App\Http\Controllers\Api\OngProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::apiResource('donor-profiles', DonorProfileController::class);
    Route::apiResource('ong-profiles', OngProfileController::class);
    Route::apiResource('categories', CategoryController::class);
});
