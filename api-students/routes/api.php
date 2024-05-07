<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('students', StudentController::class)->middleware('auth:sanctum');

Route::post('login', LoginController::class . '@login');

Route::apiResource('categories', CategoryController::class)->middleware('auth:sanctum');
