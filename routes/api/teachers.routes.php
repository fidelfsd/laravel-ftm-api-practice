<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [TeacherController::class, 'index']);

Route::get('/{id}', [TeacherController::class, 'show']);

Route::post('/', [TeacherController::class, 'store']);

Route::patch('/{id}', [TeacherController::class, 'update']);

Route::delete('/{id}', [TeacherController::class, 'destroy']);
