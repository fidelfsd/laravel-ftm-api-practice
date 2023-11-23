<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return 'get all users';
});

Route::get('/{id}', function (Request $request) {
    return 'get a user';
});

Route::post('/', function (Request $request) {
    return 'create a user';
});


Route::patch('/{id}', function (Request $request) {
    return 'update a user';
});


Route::delete('/{id}', function (Request $request) {
    return 'delete a user';
});
