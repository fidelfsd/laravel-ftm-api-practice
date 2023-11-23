<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return 'get all courses';
});

Route::get('/{id}', function (Request $request) {
    return 'get a course';
});

Route::post('/', function (Request $request) {
    return 'create a course';
});


Route::patch('/{id}', function (Request $request) {
    return 'update a course';
});


Route::delete('/{id}', function (Request $request) {
    return 'delete a course';
});
