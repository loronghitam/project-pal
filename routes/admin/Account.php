<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/account', [AuthController::class, 'index']);
Route::get('/account/{id}', [AuthController::class, 'show']);
Route::post('/account', [AuthController::class, 'store']);
Route::post('/account/{id}', [AuthController::class, 'update']);
Route::post('/account/restart/{id}', [AuthController::class, 'restart']);
Route::delete('/account/{id}', [AuthController::class, 'destroy']);
Route::get('/user', [AuthController::class, 'user']);
Route::post('/user', [AuthController::class, 'editUser']);


