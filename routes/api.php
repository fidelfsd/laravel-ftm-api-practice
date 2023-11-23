<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// authentication routes
Route::post('/login', function (Request $request) {
    return 'login';
});

Route::post('/register', function (Request $request) {
    return 'register';
});


// users routes
Route::prefix('users')->group(__DIR__ . '/api/users.routes.php');

// students routes
Route::prefix('students')->group(__DIR__ . '/api/students.routes.php');

// teachers routes
Route::prefix('teachers')->group(__DIR__ . '/api/teachers.routes.php');

// courses routes
Route::prefix('courses')->group(__DIR__ . '/api/courses.routes.php');
