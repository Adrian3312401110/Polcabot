<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Landing Page - BISA diakses siapa aja
Route::get('/', [LandingController::class, 'index'])->name('landing_page');

// Contact Form
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Guest Routes (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// Auth Routes (sudah login)
Route::middleware('auth')->group(function () {
    // Logout - redirect ke LANDING
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/chat/send', [DashboardController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/history', [DashboardController::class, 'history'])->name('chat.history');
});


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/pengguna', [AdminDashboardController::class, 'pengguna'])->name('admin.pengguna');
    Route::get('/riwayat', [AdminDashboardController::class, 'riwayat'])->name('admin.riwayat');
    Route::get('/knowledge', [AdminDashboardController::class, 'knowledge'])->name('admin.knowledge');
    Route::get('/training', [AdminDashboardController::class, 'training'])->name('admin.training');
    Route::get('/pengaturan', [AdminDashboardController::class, 'pengaturan'])->name('admin.pengaturan');
});

Route::prefix('admin')->group(function () {
    Route::get('/profile', [AdminDashboardController::class, 'editProfile'])->name('admin.profile');
    Route::put('/profile/update', [AdminDashboardController::class, 'updateProfile'])->name('admin.profile.update');
});