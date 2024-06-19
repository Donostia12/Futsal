<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

Route::post('/findlapangan', [LocationController::class, 'findlapangan']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
