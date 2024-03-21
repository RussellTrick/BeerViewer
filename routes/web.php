<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\AgeVerificationController;

Route::get('/countries', [CountriesController::class, 'index'])->middleware('age');
Route::get('/verify', [AgeVerificationController::class, 'show']);
Route::post('/verify', [AgeVerificationController::class, 'verify'])->name('verify');
Route::get('/', [CountriesController::class, 'index'])->middleware('age');


