<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function pengguna() {
        return view('admin.pengguna');
    }

    public function riwayat() {
        return view('admin.riwayat');
    }

    public function knowledge() {
        return view('admin.knowledge');
    }

    public function training() {
        return view('admin.training');
    }

    public function pengaturan() {
        return view('admin.pengaturan');
    }

    public function editProfile()
{
    return view('admin.profile');
}
public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user->nama = $request->nama;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('profile', 'public');
        $user->foto = $path;
    }

    $user->save();

    return back()->with('success', 'Profil berhasil diperbarui!');
}
}