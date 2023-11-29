<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureIsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// protected routes

Route::middleware(['auth:sanctum', EnsureIsAdmin::class])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::patch('/{user}', [UserController::class, 'update']);
    Route::delete('/{user}', [UserController::class, 'destroy']);
});
