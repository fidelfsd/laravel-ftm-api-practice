<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return 'get all students';
});

Route::get('/{id}', function (Request $request) {
    return 'get a student';
});

Route::post('/', function (Request $request) {
    return 'create a student';
});


Route::patch('/{id}', function (Request $request) {
    return 'update a student';
});


Route::delete('/{id}', function (Request $request) {
    return 'delete a student';
});
