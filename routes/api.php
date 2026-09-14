<?php

use App\Http\Controllers\Api\NameController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/names', [NameController::class, 'index']);
    Route::post('/names', [NameController::class, 'store']);
    Route::put('/names/{id}', [NameController::class, 'update']);
    Route::delete('/names/{id}', [NameController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});