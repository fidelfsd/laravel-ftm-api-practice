<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;



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


// Enrutado de users usando la metodologia de Laravel
// Route::get('users/{user}/prueba', [UserController::class, 'prueba'])
//     ->missing(function (Request $request) {
//         return response()->json(['message' => 'User resource not found from prueba'], Response::HTTP_FOUND);
//     });
// Route::apiResource('users', UserController::class)
//     ->missing(function (Request $request) {
//         return response()->json(['message' => 'User resource not found'], Response::HTTP_FOUND);
//     });
