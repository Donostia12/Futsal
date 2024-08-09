<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KecamatanController;

use App\Http\Controllers\LapanganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LocationMiddleware;
use App\Models\User;

Route::get('/location', [LocationController::class, 'index'])->name('location');
route::get('/', [IndexController::class, 'index'])->name('home'); 
route::get('/login',[UserController::class, 'index']);
route::post('/login',[UserController::class, 'login'])->name('login');
route::get('/lokasi',[LocationController::class, 'findlokasi'])->name('lokasi');
route::get('/logout',[UserController::class, 'logout'])->name('logout');
Route::get('/kecamatan/{id}', [LocationController::class, 'kecamatan']);
Route::get('/detail/{id}',[LapanganController::class, 'detail'])->name('detail');
route::get('/list', [LapanganController::class, 'list'])->name('list');
Route::fallback(function () {
    return redirect()->route('home')->with('error', 'Invalid request method or route');
});

Route::resource('review',ReviewController::class);

Route::middleware([AdminMiddleware::class])->group(function () {
    route::get('/dashboard',[UserController::class, 'dashboard'])->name('dashboard');
    Route::resource('lapangan', LapanganController::class);
    route::resource('kecamatan', KecamatanController::class);
    Route::resource('image', ImageController::class);
    Route::resource('operation',OperationController::class);
    Route::view('/kecamatan-create', 'admin.kecamatan-create')->name('kecamatan-create');
});



