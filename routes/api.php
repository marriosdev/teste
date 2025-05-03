<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('login', [App\Http\Controllers\Auth\LoginController::class, "index"]);
Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, "index"]);
Route::post('/refresh', [App\Http\Controllers\Auth\RefreshController::class, "index"]);
Route::get('/me', [App\Http\Controllers\Auth\MeController::class, "index"]);