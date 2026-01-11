<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Tampilkan form register
     */
    public function showRegisterForm()
    {
        return view('pages.register');
    }

    /**
     * Proses registrasi user baru
     */
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'username' => 'required|string|min:3|max:255|unique:users,username',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'agree'    => 'accepted',
        ], [
            'username.required' => 'Username wajib diisi!',
            'username.unique'   => 'Username sudah terdaftar!',
            'username.min'      => 'Username minimal 3 karakter!',
            'email.required'    => 'Email wajib diisi!',
            'email.email'       => 'Format email tidak valid!',
            'email.unique'      => 'Email sudah terdaftar!',
            'password.required' => 'Password wajib diisi!',
            'password.min'      => 'Password minimal 6 karakter!',
            'password.confirmed'=> 'Password dan konfirmasi password tidak sama!',
            'agree.accepted'    => 'Anda harus menyetujui penggunaan data untuk melanjutkan registrasi!',
        ]);

        // Simpan user baru
        User::create([
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect ke halaman login
        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login dengan akun Anda.');
    }
}
