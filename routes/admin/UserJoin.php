<?php

use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\UserJoinController;
use Illuminate\Support\Facades\Route;

Route::get('/joinuslist', [UserJoinController::class, 'index']);
Route::get('/joinuslist/{id}', [UserJoinController::class, 'show']);
Route::post('/joinuslist', [UserJoinController::class, 'store']);
Route::post('/joinuslist/{id}', [UserJoinController::class, 'update']);
Route::delete('/joinuslist/{id}', [UserJoinController::class, 'destroy']);

