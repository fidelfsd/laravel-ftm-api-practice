<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return 'get all teachers';
});

Route::get('/{id}', function (Request $request) {
    return 'get a teacher';
});

Route::post('/', function (Request $request) {
    return 'create a teacher';
});


Route::patch('/{id}', function (Request $request) {
    return 'update a teacher';
});


Route::delete('/{id}', function (Request $request) {
    return 'delete a teacher';
});
