<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index']);

Route::get('/{id}', [UserController::class, 'show']);

Route::post('/', [UserController::class, 'store']);

Route::patch('/{user}', [UserController::class, 'update']);

Route::delete('/{user}', [UserController::class, 'destroy']);


