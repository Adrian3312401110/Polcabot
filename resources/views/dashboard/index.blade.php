@extends('layouts.dashboard')

@section('title', 'Dashboard - PolCaBot')

@section('dashboard-content')
<div class="main-content" id="mainContent">
    <div class="welcome-section">
        <h1>Selamat Datang di <span class="dark-text">P</span><span style="color:orange;">o</span><span class="dark-text">l</span><span style="color:#0ea5e9;">CaBot</span></h1>
        <p class="subtitle">Hai {{ $user->name ?? 'User' }}, PolCaBot siap membantu menjawab segala pertanyaan akademik dari Kampus Polibatam</p>

        <div class="quick-actions">
            @foreach($quickActions as $action)
            <div class="action-card">
                <h3>{{ $action['title'] }}</h3>
                <p>{{ $action['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection