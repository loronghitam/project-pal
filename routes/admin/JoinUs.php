<?php

use App\Http\Controllers\JoinUsController;
use Illuminate\Support\Facades\Route;

Route::get('/joinus', [JoinUsController::class, 'index']);
Route::get('/joinus/{id}', [JoinUsController::class, 'show']);
Route::post('/joinus', [JoinUsController::class, 'store']);
Route::post('/joinus/{id}', [JoinUsController::class, 'update']);
Route::delete('/joinus/{id}', [JoinUsController::class, 'destroy']);

