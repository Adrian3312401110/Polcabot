<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // kalau nanti ada data dari database bisa dipassing ke view
        return view('landing');
    }

    public function features()
    {
        // nanti bisa load fitur dari DB kalau mau dinamis
        return view('features');
    }

}
