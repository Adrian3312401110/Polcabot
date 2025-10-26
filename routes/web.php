<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChatBotController;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing_page');

// Contact Form
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Chat Routes
    Route::post('/chat/create', [DashboardController::class, 'startChat'])->name('chat.create');
    Route::get('/chat/{chatId}', [DashboardController::class, 'chat'])->name('chat.show');

    // Chat API ke Groq
    Route::post('/chat/send', [ChatBotController::class, 'chat'])->name('chatbot.chat');
});
