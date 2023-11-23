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

// -----------------------------------------------------------------------------
// variante 1 para registrar las rutas (manual)
// -----------------------------------------------------------------------------

// // users routes
// Route::prefix('users')->group(__DIR__ . '/api/users.routes.php');

// // students routes
// Route::prefix('students')->group(__DIR__ . '/api/students.routes.php');

// // teachers routes
// Route::prefix('teachers')->group(__DIR__ . '/api/teachers.routes.php');

// // courses routes
// Route::prefix('courses')->group(__DIR__ . '/api/courses.routes.php');


// -----------------------------------------------------------------------------
// variante 2 para registrar las rutas (dinamico)
// -----------------------------------------------------------------------------

// Get all files from API directory
$files = glob(__DIR__ . '/api/*.routes.php');

// Iterate through each file and register the routes
foreach ($files as $file) {
    // Extract the prefix and file name from the path
    $routeFileName = basename($file);
    $prefix = explode('.', $routeFileName)[0];

    // Register the routes
    Route::prefix($prefix)->group($file);
}
