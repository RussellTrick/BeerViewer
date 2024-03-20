<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeersController;
use App\Http\Controllers\AgeVerificationController;

Route::get('/beers', [BeersController::class, 'index'])->middleware('age');
Route::get('/verify', [AgeVerificationController::class, 'show']);
Route::post('/verify', [AgeVerificationController::class, 'verify'])->name('verify');

