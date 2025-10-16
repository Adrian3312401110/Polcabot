@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endpush

@section('content')
<div class="landing-page" id="landingPage">
    <!-- Navbar -->
    <nav>
        <div class="logo">
            <img src="images/logo.png" alt="PolCaBot Logo">
            <span>
                <span style="color:white;">P</span><span style="color:orange;">o</span><span style="color:white;">l</span><span style="color:#1e90ff;">CaBot</span>
            </span>
        </div>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <!-- Tombol tanpa fungsi (tidak ada route) -->
        <a href="#" class="btn-signin" onclick="return false;">Sign In</a>
    </nav>

    @yield('landing-content')

    <!-- Footer -->
    <footer>
        <p>© 2025 PolCaBot. All rights reserved.</p>
        <ul>
            <li><a href="#">UI Design</a></li>
            <li><a href="#">UX Design</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Best Practices</a></li>
        </ul>
    </footer>
</div>
@endsection
