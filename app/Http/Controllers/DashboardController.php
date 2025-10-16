<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display dashboard page
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get chat history
        $chatHistory = [
            'Ada Organisasi apa saja di Polibatam',
            'Ada jurusan apa saja di Polibatam',
            'Jadwal Perkuliahan kelas pagi',
            'Cara daftar beasiswa Polibatam'
        ];
        
        // Quick actions
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
        
        return view('dashboard.index', compact('user', 'chatHistory', 'quickActions'));
    }

    /**
     * Send chat message
     */
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        // Process AI response here
        // $response = AIService::getResponse($validated['message']);

        return response()->json([
            'success' => true,
            'message' => 'Pesan terkirim',
            'response' => 'Ini adalah response dari AI'
        ]);
    }

    /**
     * Get chat history
     */
    public function history()
    {
        // Get user chat history from database
        $history = [
            // Query chat history from database
        ];

        return response()->json([
            'success' => true,
            'history' => $history
        ]);
    }
}