<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;

// Public routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess']);
    
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

// Protected routes - require authentication
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
    
    // Payments
    Route::resource('payments', PaymentController::class);
    // Payments - Edit data for modal
    Route::get('/payments/{payment}/edit-data', [PaymentController::class, 'editData'])->name('payments.edit-data');
    
    // Laporan
    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/pendapatan', [ReportController::class, 'pendapatan'])->name('laporan.pendapatan');
    Route::get('/laporan/kamar', [ReportController::class, 'kamar'])->name('laporan.kamar');
    Route::get('/laporan/penyewa', [ReportController::class, 'penyewa'])->name('laporan.penyewa');
    Route::post('/laporan/generate', [ReportController::class, 'generate'])->name('laporan.generate');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Redirect root
Route::get('/', function () {
    return auth()->check() 
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});