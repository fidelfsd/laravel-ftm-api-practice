<?php

use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [CourseController::class, 'index']);

Route::get('/{id}', [CourseController::class, 'show']);

Route::post('/', [CourseController::class, 'store']);

Route::patch('/{id}', [CourseController::class, 'update']);

Route::delete('/{id}', [CourseController::class, 'destroy']);
