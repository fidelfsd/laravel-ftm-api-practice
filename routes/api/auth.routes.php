<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/login', function (Request $request) {
    return 'login';
});

Route::post('/register', [AuthController::class, 'register']);
