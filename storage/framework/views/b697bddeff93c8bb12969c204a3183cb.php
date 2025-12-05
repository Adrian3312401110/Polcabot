<div class="sidebar" id="sidebar">
    <!-- Sidebar Header with New Chat -->
    <div class="sidebar-header">
        <button class="new-chat-btn" onclick="newChat()">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
            </svg>
            New Chat
        </button>
    </div>

    <!-- Search Bar -->
    <div class="search-container">
        <svg class="search-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
        </svg>
        <input type="text" id="searchChat" placeholder="Search chat..." oninput="searchChats(this.value)">
    </div>

    <!-- History Chat Section -->
    <div class="sidebar-section">
        <h3>History Chat</h3>
        <ul class="sidebar-menu" id="chatHistoryList">
            <?php $__empty_1 = true; $__currentLoopData = $chatHistory ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li class="chat-history-item" data-chat="<?php echo e($chat); ?>" onclick="loadChat(event, '<?php echo e($chat); ?>')">
                    <span class="chat-text"><?php echo e($chat); ?></span>
                    <button class="delete-chat-btn" onclick="event.stopPropagation(); deleteChat(<?php echo e($index); ?>)">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                        </svg>
                    </button>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li class="empty-state">Belum ada riwayat chat</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Dark Mode Toggle -->
    <div class="dark-mode-toggle">
        <span>🌙 Dark Mode</span>
        <div class="toggle-switch" onclick="toggleDarkMode()" id="darkModeToggle"></div>
    </div>

    <!-- Profile Card -->
    <div class="profile-card" id="profileCardBtn">
        <img src="https://i.pravatar.cc/150?img=12" alt="Profile">
        <div class="name"><?php echo e(Auth::user()->name ?? 'User'); ?></div>
    </div>
</div>

<!-- Profile Modal -->
<div class="profile-modal" id="profileModal">
    <div class="profile-modal-content">
        <span class="close-btn" onclick="closeProfile()">&times;</span>
        <div class="profile-header">
            <img src="https://i.pravatar.cc/150?img=12" alt="Profile">
            <h2>Profile</h2>
        </div>
        <form class="profile-form" id="profileForm">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo e(Auth::user()->name ?? 'Alex Marshall'); ?>" required>
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" value="<?php echo e(Auth::user()->nim ?? 'alex_marshall'); ?>">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="phone" value="<?php echo e(Auth::user()->phone ?? '+1 915 999 9685'); ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo e(Auth::user()->email ?? 'alexmarshall2072@gmail.com'); ?>" required>
            </div>
            <div class="profile-actions">
                <button type="submit" class="btn-save">Save</button>
                <button type="button" class="btn-logout" onclick="handleLogout()">Log Out</button>
            </div>
        </form>
    </div>
</div>

<style>
/* ========== SIDEBAR STYLES ========== */
.sidebar {
    position: fixed;
    top: 70px;
    left: 0;
    width: 260px;
    height: calc(100vh - 70px);
    padding: 80px 20px 20px 20px;
    transition: background 0.3s ease, transform 0.3s ease;
    z-index: 999;
    overflow-y: auto;
}

.light-mode .sidebar {
    background: #1e3a8a;
    color: white;
}

.dark-mode .sidebar {
    background: #0f172a;
    color: white;
}

.sidebar.hidden {
    transform: translateX(-100%);
}

/* Sidebar Scrollbar */
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: rgba(255,255,255,0.05);
}

.sidebar::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.2);
    border-radius: 3px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255,255,255,0.3);
}

/* Sidebar Header */
.sidebar-header {
    padding: 0 5px 20px;
}

.new-chat-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 20px;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 8px;
    color: white;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.new-chat-btn:hover {
    background: rgba(255,255,255,0.25);
    transform: translateY(-1px);
}

.new-chat-btn svg {
    width: 18px;
    height: 18px;
}

/* Search Container */
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
    width: 18px;
    height: 18px;
    opacity: 0.5;
    fill: white;
}

.search-container input {
    width: 100%;
    padding: 10px 15px 10px 45px;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 8px;
    color: white;
    font-size: 14px;
    outline: none;
    transition: all 0.2s ease;
}

.search-container input::placeholder {
    color: rgba(255,255,255,0.5);
}

.search-container input:focus {
    background: rgba(255,255,255,0.15);
    border-color: rgba(255,255,255,0.3);
}

/* Sidebar Section */
.sidebar-section {
    margin-bottom: 25px;
}

.sidebar-section h3 {
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 12px;
    opacity: 0.7;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 0 5px;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* Chat History Item */
.chat-history-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 12px;
    margin-bottom: 6px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.2s ease;
    position: relative;
}

.chat-history-item:hover {
    background: rgba(255,255,255,0.1);
}

.chat-text {
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: 13px;
    line-height: 1.4;
}

.delete-chat-btn {
    display: none;
    width: 28px;
    height: 28px;
    border: none;
    background: rgba(239, 68, 68, 0.8);
    border-radius: 6px;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    flex-shrink: 0;
    margin-left: 8px;
}

.chat-history-item:hover .delete-chat-btn {
    display: flex;
}

.delete-chat-btn:hover {
    background: rgba(239, 68, 68, 1);
    transform: scale(1.05);
}

.delete-chat-btn svg {
    width: 16px;
    height: 16px;
    fill: white;
}

.empty-state {
    padding: 20px 12px;
    text-align: center;
    opacity: 0.5;
    font-size: 13px;
    list-style: none;
}

.chat-history-item.hidden {
    display: none;
}

/* Dark Mode Toggle */
.dark-mode-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px;
    margin: 20px 0;
    border-radius: 8px;
    background: rgba(255,255,255,0.1);
}

.toggle-switch {
    position: relative;
    width: 50px;
    height: 25px;
    background: #ccc;
    border-radius: 25px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.toggle-switch.active {
    background: #0ea5e9;
}

.toggle-switch::after {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    width: 21px;
    height: 21px;
    background: white;
    border-radius: 50%;
    transition: transform 0.3s ease;
}

.toggle-switch.active::after {
    transform: translateX(25px);
}

/* Profile Card */
.profile-card {
    padding: 15px;
    border-radius: 8px;
    background: rgba(255,255,255,0.1);
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    transition: background 0.2s ease;
}

.profile-card:hover {
    background: rgba(255,255,255,0.15);
}

.profile-card img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.profile-card .name {
    font-weight: bold;
    font-size: 15px;
}

/* ========== PROFILE MODAL ========== */
.profile-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 2000;
}

.profile-modal.active {
    display: flex;
}

.profile-modal-content {
    padding: 40px;
    border-radius: 16px;
    max-width: 400px;
    width: 90%;
    position: relative;
    box-shadow: 0 10px 40px rgba(0,0,0,0.3);
}

.light-mode .profile-modal-content {
    background: white;
    color: #333;
}

.dark-mode .profile-modal-content {
    background: #2d3748;
    color: white;
}

.close-btn {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 32px;
    cursor: pointer;
    opacity: 0.6;
    line-height: 1;
    transition: opacity 0.2s ease;
}

.close-btn:hover {
    opacity: 1;
}

.profile-header {
    text-align: center;
    margin-bottom: 30px;
}

.profile-header img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
    border: 4px solid #0ea5e9;
}

.profile-header h2 {
    font-size: 24px;
    font-weight: 600;
    margin: 0;
}

.profile-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 14px;
}

.form-group input {
    width: 100%;
    padding: 12px 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 15px;
    transition: all 0.2s ease;
}

.form-group input:focus {
    outline: none;
    border-color: #0ea5e9;
    box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
}

.light-mode .form-group input {
    background: #f5f5f5;
    color: #333;
}

.dark-mode .form-group input {
    background: #1a1a2e;
    color: white;
    border-color: #444;
}

.profile-actions {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.profile-actions button {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-save {
    background: #0ea5e9;
    color: white;
}

.btn-save:hover {
    background: #0284c7;
    transform: translateY(-1px);
}

.btn-logout {
    background: #ef4444;
    color: white;
}

.btn-logout:hover {
    background: #dc2626;
    transform: translateY(-1px);
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
    }
    
    .sidebar.active {
        transform: translateX(0);
    }
}
</style>

<script>
console.log('Sidebar script initialized');

// ========== NEW CHAT ==========
function newChat() {
    if (confirm('Mulai chat baru? Riwayat chat saat ini akan disimpan.')) {
        window.location.href = '<?php echo e(route("dashboard")); ?>';
    }
}

// ========== SEARCH CHATS ==========
function searchChats(query) {
    const items = document.querySelectorAll('.chat-history-item');
    const searchLower = query.toLowerCase();

    items.forEach(item => {
        const text = item.getAttribute('data-chat').toLowerCase();
        if (text.includes(searchLower)) {
            item.classList.remove('hidden');
        } else {
            item.classList.add('hidden');
        }
    });
}

// ========== LOAD CHAT ==========
function loadChat(event, chatText) {
    console.log('Loading chat:', chatText);
    const chatInput = document.getElementById('chatInput');
    if (chatInput) {
        chatInput.value = chatText;
        chatInput.focus();
    }
}

// ========== DELETE CHAT ==========
function deleteChat(index) {
    if (confirm('Hapus riwayat chat ini?')) {
        console.log('Deleting chat index:', index);
        const items = document.querySelectorAll('.chat-history-item');
        if (items[index]) {
            items[index].remove();
        }
        
        const remaining = document.querySelectorAll('.chat-history-item').length;
        if (remaining === 0) {
            document.getElementById('chatHistoryList').innerHTML = '<li class="empty-state">Belum ada riwayat chat</li>';
        }
    }
}

// ========== PROFILE MODAL ==========
function openProfile() {
    console.log('Opening profile modal');
    const modal = document.getElementById('profileModal');
    if (modal) {
        modal.classList.add('active');
        console.log('✓ Profile modal opened');
    } else {
        console.error('✗ Profile modal not found');
    }
}

function closeProfile() {
    console.log('Closing profile modal');
    const modal = document.getElementById('profileModal');
    if (modal) {
        modal.classList.remove('active');
        console.log('✓ Profile modal closed');
    }
}

// ========== LOGOUT ==========
function handleLogout() {
    if (confirm('Apakah Anda yakin ingin logout?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo e(route("logout")); ?>';
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '<?php echo e(csrf_token()); ?>';
        
        form.appendChild(csrfToken);
        document.body.appendChild(form);
        form.submit();
    }
}

// ========== DOM READY ==========
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Ready - Initializing sidebar');
    
    // Profile Card Click
    const profileCard = document.getElementById('profileCardBtn');
    if (profileCard) {
        profileCard.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Profile card clicked');
            openProfile();
        });
        console.log('✓ Profile card listener attached');
    }
    
    // Profile Modal Click Outside
    const profileModal = document.getElementById('profileModal');
    if (profileModal) {
        profileModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeProfile();
            }
        });
        console.log('✓ Profile modal found');
    }
    
    // Profile Form Submit
    const profileForm = document.getElementById('profileForm');
    if (profileForm) {
        profileForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            console.log('Profile form submitted:', Object.fromEntries(formData));
            alert('Profile update - integrate with backend API');
            closeProfile();
        });
        console.log('✓ Profile form listener attached');
    }
});

// Export to window
window.openProfile = openProfile;
window.closeProfile = closeProfile;
window.newChat = newChat;
window.searchChats = searchChats;
window.loadChat = loadChat;
window.deleteChat = deleteChat;
window.handleLogout = handleLogout;

console.log('✓ All sidebar functions exported');
</script><?php /**PATH C:\laragon\www\Polcabot-6\Polcabot-6\resources\views/components/sidebar.blade.php ENDPATH**/ ?>