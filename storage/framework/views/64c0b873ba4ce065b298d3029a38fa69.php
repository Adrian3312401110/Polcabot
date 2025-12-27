<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <button class="new-chat-btn" onclick="newChat()">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
            </svg>
            New Chat
        </button>
    </div>
    <div class="search-container">
        <svg class="search-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 
            16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 
            3.09-.59 4.23-1.57l.27.28v.79l5 
            4.99L20.49 19l-4.99-5zm-6 
            0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 
            14 7.01 14 9.5 11.99 14 9.5 14z"/>
        </svg>
        <input type="text" id="searchChat" placeholder="Search chat..." oninput="searchChats(this.value)">
    </div>
    <div class="sidebar-section">
        <h3>History Chat</h3>
        <ul class="sidebar-menu" id="chatHistoryList">
            <li class="empty-state">Memuat riwayat chat...</li>
        </ul>
    </div>
    <div class="dark-mode-toggle">
        <span>🌙 Dark Mode</span>
        <div class="toggle-switch" onclick="toggleDarkMode()" id="darkModeToggle"></div>
    </div>
<div class="profile-card" id="profileCardBtn">

    <?php
        $name = Auth::user()->username ?? Auth::user()->name;
        $initial = strtoupper(substr($name, 0, 1));
    ?>
    <div class="sidebar-avatar">
        <?php echo e($initial); ?>

    </div>
    <div class="name">
        <?php echo e(Auth::user()->username ?? 'User'); ?>

    </div>
</div>
</div>
<div class="profile-modal" id="profileModal">
    <div class="profile-modal-content">
        <span class="close-btn" onclick="closeProfile()">&times;</span>

        <div class="profile-header">

            <?php
                $name = Auth::user()->username ?? Auth::user()->name;
                $initial = strtoupper(substr($name, 0, 1));
            ?>
            <div class="profile-avatar">
                <?php echo e($initial); ?>

            </div>

            <h2>Profile</h2>
        </div>

        <form class="profile-form" id="profileForm">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Username</label>
                <input 
                    type="text" 
                    name="username" 
                    value="<?php echo e(Auth::user()->username); ?>" 
                    required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input 
                    type="email" 
                    name="email" 
                    value="<?php echo e(Auth::user()->email); ?>" 
                    required>
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Biarkan kosong jika tidak ingin mengubah password">
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    placeholder="Ulangi password baru">
            </div>

            <div class="profile-actions">
                <button type="submit" class="btn-save">Save</button>
                <button type="button" class="btn-logout" onclick="handleLogout()">Log Out</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById("profileForm").addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("<?php echo e(route('profile.update')); ?>", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
            "Accept": "application/json"
        },
        body: new FormData(this)
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert("Profil berhasil diperbarui!");
            closeProfile();
            location.reload();
        } else {
            let msg = "Gagal memperbarui profil:\n";
            Object.values(data.errors).forEach(err => {
                msg += "- " + err + "\n";
            });
            alert(msg);
        }
    })
    .catch(err => {
        alert("Terjadi kesalahan saat mengupdate profile");
        console.error(err);
    });
});
</script>




<style>
.sidebar {
    position: fixed;
    top: 70px;
    left: 0;
    width: 260px;
    height: calc(100vh - 70px);
    padding: 80px 20px 20px 20px;
    transition: background 0.3s ease, transform 0.3s ease;
    overflow-y: auto;
    z-index: 999;
}

.light-mode .sidebar {
    background: #1e3a8a;
    color: white;
}

.dark-mode .sidebar {
    background: #0f172a;
    color: white;
}

.sidebar.hidden { transform: translateX(-100%); }
.sidebar::-webkit-scrollbar { width: 6px; }
.sidebar::-webkit-scrollbar-track { background: rgba(255,255,255,0.05); }
.sidebar::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.2);
    border-radius: 3px;
}
.sidebar-header { padding: 0 5px 20px; }

.new-chat-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;

    padding: 8px 12px;      /* ⬅️ lebih kecil */
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 6px;     /* ⬅️ lebih ramping */
    color: white;

    font-size: 12px;        /* ⬅️ kecilin teks */
    font-weight: 500;
    cursor: pointer;
}

.new-chat-btn svg {
    width: 14px;
    height: 14px;
}

.new-chat-btn:hover {
    background: rgba(255,255,255,0.25);
}
.search-container {
    position: relative;
    margin-bottom: 20px;
    padding: 0 5px;
}

.search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0.5;
    width: 18px; height: 18px;
}

.search-container input {
    width: 100%;
    padding: 10px 15px 10px 45px;
    background: rgba(255,255,255,0.1);
    color: white;
    border-radius: 8px;
    border: 1px solid rgba(255,255,255,0.15);
}
.sidebar-section { margin-bottom: 25px; }

.sidebar-section h3 {
    font-size: 13px;
    margin-bottom: 12px;
    opacity: 0.7;
    text-transform: uppercase;
}

.chat-history-item {
    display: flex;
    justify-content: space-between;
    padding: 10px 12px;
    border-radius: 8px;
    margin-bottom: 6px;
    cursor: pointer;
}

.chat-history-item:hover {
    background: rgba(255,255,255,0.1);
}

.chat-text {
    font-size: 13px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chat-history-item.hidden { display: none; }
.delete-chat-btn {
    display: none;
    width: 28px;
    height: 28px;
    background: #ef4444;
    border-radius: 6px;
    border: none;
    color: white;
}

.chat-history-item:hover .delete-chat-btn {
    display: flex;
    align-items: center;
    justify-content: center;
}

.dark-mode-toggle {
    display: flex;
    justify-content: space-between;
    padding: 15px;
    border-radius: 8px;
    background: rgba(255,255,255,0.1);
}

.toggle-switch {
    width: 50px;
    height: 25px;
    background: #ccc;
    border-radius: 25px;
    position: relative;
    cursor: pointer;
}

.toggle-switch.active { background: #0ea5e9; }

.toggle-switch::after {
    content: "";
    position: absolute;
    top: 2px; left: 2px;
    width: 21px; height: 21px;
    background: white;
    border-radius: 50%;
    transition: transform 0.3s ease;
}

.toggle-switch.active::after {
    transform: translateX(25px);
}

.profile-card {
    padding: 15px;
    border-radius: 8px;
    background: rgba(255,255,255,0.1);
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
}

.profile-card:hover {
    background: rgba(255,255,255,0.2);
}

.profile-card img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.profile-modal {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 2000;
    animation: fadeIn 0.2s ease;
}

.profile-modal.active { display: flex; }

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.profile-modal-content {
    background: white;
    padding: 40px;
    border-radius: 16px;
    width: 90%;
    max-width: 400px;
    animation: popIn 0.25s ease;
}

@keyframes popIn {
    from { transform: scale(0.95); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.dark-mode .profile-modal-content {
    background: #2d3748;
    color: white;
}

.profile-form { display: flex; flex-direction: column; gap: 20px; }

.profile-actions {
    display: flex;
    gap: 10px;
}

.btn-save {
    background: #0ea5e9;
    padding: 12px;
    border-radius: 8px;
    border: none;
    color: white;
    font-weight: bold;
}

.btn-logout {
    background: #ef4444;
    padding: 12px;
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: bold;
}

.profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #0ea5e9;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
    }

@media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); }
    .sidebar.active { transform: translateX(0); }
}
</style>

<script>
function newChat() {
    if (confirm("Mulai chat baru?")) {
        window.location.href = "<?php echo e(route('dashboard')); ?>";
    }
}

function searchChats(q) {
    q = q.toLowerCase();
    document.querySelectorAll('.chat-history-item').forEach(item => {
        const text = item.dataset.chat.toLowerCase();
        item.classList.toggle("hidden", !text.includes(q));
    });
}

function loadChat(event, text) {
    const input = document.getElementById('chatInput');
    if (input) {
        input.value = text;
        input.focus();
    }
}

function openProfile() {
    document.getElementById('profileModal').classList.add('active');
}

function closeProfile() {
    document.getElementById('profileModal').classList.remove('active');
}

function handleLogout() {
    if (confirm("Yakin ingin logout?")) {
        const form = document.createElement("form");
        form.method = "POST";
        form.action = "<?php echo e(route('logout')); ?>";

        const csrf = document.createElement("input");
        csrf.type = "hidden";
        csrf.name = "_token";
        csrf.value = "<?php echo e(csrf_token()); ?>";

        form.appendChild(csrf);
        document.body.appendChild(form);
        form.submit();
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const body = document.body;
    const toggle = document.getElementById("darkModeToggle");
    const saved = localStorage.getItem("theme");

    if (saved === "dark") {
        body.classList.add("dark-mode");
        toggle.classList.add("active");
    } else {
        body.classList.add("light-mode");
    }
});

function toggleDarkMode() {
    const body = document.body;
    const toggle = document.getElementById("darkModeToggle");

    const isDark = body.classList.contains("dark-mode");

    body.classList.toggle("dark-mode", !isDark);
    body.classList.toggle("light-mode", isDark);
    toggle.classList.toggle("active");

    localStorage.setItem("theme", isDark ? "light" : "dark");
}

document.addEventListener("DOMContentLoaded", () => {
    const card = document.getElementById("profileCardBtn");
    if (card) {
        card.addEventListener("click", e => {
            e.preventDefault();
            e.stopPropagation();
            openProfile();
        });
    }

    const modal = document.getElementById("profileModal");
    if (modal) {
        modal.addEventListener("click", e => {
            if (e.target === modal) closeProfile();
        });
    }
});

document.addEventListener("DOMContentLoaded", () => {
    loadChatHistory();
});

function loadChatHistory() {
    fetch('/conversations')
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById('chatHistoryList');
            list.innerHTML = '';

            if (!data || data.length === 0) {
                list.innerHTML =
                    `<li class="empty-state">Belum ada riwayat chat</li>`;
                return;
            }

            data.forEach(item => {
                const li = document.createElement('li');
                li.className = 'chat-history-item';
                li.dataset.chat = item.title;

                li.onclick = () => {
                    const input = document.getElementById('chatInput');
                    if (input) {
                        input.value = item.title;
                        input.focus();
                    }
                };

                li.innerHTML = `
                    <span class="chat-text">${item.title}</span>
                    <button class="delete-chat-btn"
                        onclick="event.stopPropagation(); deleteHistory(${item.id})">
                        🗑
                    </button>
                `;
                list.appendChild(li);
            });
        })
        .catch(err => {
            console.error('Gagal load history:', err);
        });
}

function deleteHistory(id) {
    if (!confirm("Hapus riwayat ini?")) return;

    fetch(`/conversations/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
        }
    }).then(() => loadChatHistory());
}
</script><?php /**PATH C:\laragon\www\Polcabot\resources\views/components/sidebar.blade.php ENDPATH**/ ?>