<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [StudentController::class, 'index']);

Route::get('/{id}', [StudentController::class, 'show']);

Route::post('/', [StudentController::class, 'store']);

Route::patch('/{id}', [StudentController::class, 'update']);

Route::delete('/{id}', [StudentController::class, 'destroy']);
