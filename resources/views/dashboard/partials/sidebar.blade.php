<div class="sidebar" id="sidebar">
    <div class="sidebar-section">
        <h3>History Chat</h3>
        <ul class="sidebar-menu">
            @forelse($chatHistory ?? [] as $chat)
                <li>{{ $chat }}</li>
            @empty
                <li>Belum ada riwayat chat</li>
            @endforelse
        </ul>
    </div>

    <div class="dark-mode-toggle">
        <span>🌙 Dark Mode</span>
        <div class="toggle-switch" onclick="toggleDarkMode()" id="darkModeToggle"></div>
    </div>

    <div class="profile-card" onclick="openProfile()">
        <img src="https://i.pravatar.cc/150?img=12" alt="Profile">
        <div class="name">{{ Auth::user()->name ?? 'User' }}</div>
    </div>
</div>