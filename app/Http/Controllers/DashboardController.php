<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard utama
     */
    public function index()
    {
        $user = Auth::user();

        // Chat history (dummy data sementara)
        $chatHistory = [
            'Ada Organisasi apa saja di Polibatam',
            'Ada jurusan apa saja di Polibatam',
            'Jadwal Perkuliahan kelas pagi',
            'Cara daftar beasiswa Polibatam'
        ];

        // Quick actions di dashboard
        $quickActions = [
            [
                'title' => 'Ada Organisasi apa saja di Polibatam',
                'description' => 'Tanya tentang organisasi kemahasiswaan'
            ],
            [
                'title' => 'Ada jurusan apa saja di Polibatam',
                'description' => 'Informasi lengkap program studi'
            ],
            [
                'title' => 'Jadwal Perkuliahan kelas pagi',
                'description' => 'Cek jadwal kuliah harian'
            ],
            [
                'title' => 'Cara daftar beasiswa Polibatam',
                'description' => 'Informasi lengkap beasiswa kampus'
            ]
        ];

        // Kirim data ke view pages.index
        return view('pages.index', compact('user', 'chatHistory', 'quickActions'));
    }

    /**
     * Kirim pesan chat ke AI
     */
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        // Proses AI response (sementara dummy response)
        // Kalau nanti mau pakai API AI bisa dihubungkan di sini
        $response = 'Ini adalah respon dari PolCaBot untuk pesan: "' . $validated['message'] . '"';

        return response()->json([
            'success' => true,
            'message' => 'Pesan terkirim!',
            'response' => $response
        ]);
    }

    /**
     * Ambil riwayat chat user
     */
    public function history()
    {
        // Contoh data dummy — nanti bisa diganti dengan query database
        $history = [
            'Halo PolCaBot!',
            'Apa itu Polibatam?',
            'Bagaimana cara daftar beasiswa?'
        ];

        return response()->json([
            'success' => true,
            'history' => $history
        ]);
    }
}
