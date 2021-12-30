<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/formulario', [App\Http\Controllers\UserController::class, 'index']);

Route::get('/array', [App\Http\Controllers\ArrayController::class, 'index']);
Route::get('/array/exemplo', [App\Http\Controllers\ArrayController::class, 'exemplo']);

Route::get('/sql', [App\Http\Controllers\SqlController::class, 'index']);

Route::group(['prefix' => 'api'], function () {
    Route::post('/user', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('/user', [App\Http\Controllers\UserController::class, 'list']);
    Route::delete('/user', [App\Http\Controllers\UserController::class, 'destroy']);
});
