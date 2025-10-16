<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

// Landing Page Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/features', [HomeController::class, 'features'])->name('features');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Profile Routes
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Chat Routes
Route::post('/chat/send', [DashboardController::class, 'sendMessage'])->name('chat.send');
Route::get('/chat/history', [DashboardController::class, 'history'])->name('chat.history');
