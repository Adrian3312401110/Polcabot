<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function showLoginForm()
    {
        return view('pages.login');
    }

    /**
     * Process login user
     */
    public function login(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
        ]);

        // Cari user berdasarkan username DAN email
        $user = User::where('username', $validated['username'])
                    ->where('email', $validated['email'])
                    ->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && Hash::check($validated['password'], $user->password)) {
            // Login user
            Auth::login($user);
            
            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke dashboard
            return redirect()->route('dashboard')->with('success', 'Login berhasil! Selamat datang, ' . $user->username);
        }

        // Jika gagal, kembali dengan error
        return back()->withErrors([
            'login' => 'Username, email, atau password salah!',
        ])->withInput($request->except('password'));
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}