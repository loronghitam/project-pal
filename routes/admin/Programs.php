<?php

use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/programs', [ProgramController::class, 'index']);
Route::get('/programs/{id}', [ProgramController::class, 'show']);
Route::post('/programs', [ProgramController::class, 'store']);
Route::post('/programs/{id}', [ProgramController::class, 'update']);
Route::delete('/programs/{id}', [ProgramController::class, 'destroy']);

