<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

Route::post('/findlapangan', [LocationController::class, 'findlapangan']);
Route::post('/findkecamatan', [LocationController::class, 'findkecamatan']);
Route::post('/haversine', [LocationController::class, 'showhaversine']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
