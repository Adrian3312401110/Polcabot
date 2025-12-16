<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // contoh data dummy
        $stats = [
            'total_users' => 124,
            'total_chats' => 534,
            'active_today' => 28,
            'system_status' => 'Normal'
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
