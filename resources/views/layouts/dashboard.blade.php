@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
<div class="dashboard-page active">
    @include('dashboard.partials.topbar')
    
    <!-- Menu Toggle -->
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    
    @include('dashboard.partials.sidebar')
    
    @yield('dashboard-content')
    
    @include('dashboard.partials.chat-input')
    
    @include('profile.modal')
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/profile.js') }}"></script>
@endpush