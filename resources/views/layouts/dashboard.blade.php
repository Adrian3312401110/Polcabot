@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
<div class="dashboard-page active">
    @include('components.topbar')

    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>

    @include('components.sidebar')

    @yield('dashboard-content')

    @include('components.chat_input')

    @include('components.modal')
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/profile.js') }}"></script>
@endpush
