<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PenyewaController;

// Public routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess']);
    
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

// Protected routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rooms
    Route::resource('rooms', RoomController::class);
    Route::put('/rooms/{room}/status', [RoomController::class, 'updateStatus'])->name('rooms.update-status');
    Route::post('/rooms/{room}/vacate', [RoomController::class, 'vacateRoom'])->name('rooms.vacate');
    
    // Penyewas
    Route::resource('penyewas', PenyewaController::class);
    Route::put('/penyewas/{penyewa}/status', [PenyewaController::class, 'updateStatus'])->name('penyewas.update-status');
    Route::post('/penyewas/{penyewa}/assign-room', [PenyewaController::class, 'assignRoom'])->name('penyewas.assign-room');
    Route::post('/penyewas/{penyewa}/remove-room', [PenyewaController::class, 'removeRoom'])->name('penyewas.remove-room');
    Route::get('/penyewas/available-rooms', [PenyewaController::class, 'getAvailableRooms'])->name('penyewas.available-rooms');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Redirect root
Route::get('/', function () {
    return auth()->check() 
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});