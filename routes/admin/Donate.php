<?php

use App\Http\Controllers\DonateController;
use Illuminate\Support\Facades\Route;

Route::get('/donates', [DonateController::class, 'index']);
Route::get('/donates/{id}', [DonateController::class, 'show']);
Route::post('/donates', [DonateController::class, 'store']);
Route::post('/donates/{id}', [DonateController::class, 'update']);
Route::delete('/donates/{id}', [DonateController::class, 'destroy']);
Route::post('/export', [DonateController::class, 'export'])->name('export');
Route::get('/report', [DonateController::class, 'report']);



