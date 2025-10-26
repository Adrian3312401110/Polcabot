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
                <li class="chat-history-item" data-chat="<?php echo e($chat); ?>">
                    <span class="chat-text"><?php echo e($chat); ?></span>
                    <button class="delete-chat-btn" onclick="deleteChat(<?php echo e($index); ?>)">
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
    <div class="profile-card" onclick="openProfile()">
        <img src="https://i.pravatar.cc/150?img=12" alt="Profile">
        <div class="name"><?php echo e(Auth::user()->name ?? 'User'); ?></div>
    </div>
</div>

<style>
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
}

/* Hidden state for search */
.chat-history-item.hidden {
    display: none;
}
</style>

<script>
// New Chat Function
function newChat() {
    if (confirm('Mulai chat baru? Riwayat chat saat ini akan disimpan.')) {
        window.location.href = '<?php echo e(route("dashboard")); ?>';
    }
}

// Search Chats Function
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

// Delete Chat Function
function deleteChat(index) {
    if (confirm('Hapus riwayat chat ini?')) {
        // TODO: Implement delete chat API call
        fetch('/chat/delete/' + index, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove the item from DOM
                const items = document.querySelectorAll('.chat-history-item');
                if (items[index]) {
                    items[index].remove();
                }
                
                // Check if empty
                const remaining = document.querySelectorAll('.chat-history-item').length;
                if (remaining === 0) {
                    document.getElementById('chatHistoryList').innerHTML = '<li class="empty-state">Belum ada riwayat chat</li>';
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal menghapus chat');
        });
    }
}

// Click chat history to load
document.addEventListener('DOMContentLoaded', function() {
    const chatItems = document.querySelectorAll('.chat-history-item');
    chatItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Don't trigger if clicking delete button
            if (e.target.closest('.delete-chat-btn')) return;
            
            const chatText = this.getAttribute('data-chat');
            const chatInput = document.getElementById('chatInput');
            if (chatInput) {
                chatInput.value = chatText;
                chatInput.focus();
            }
        });
    });
});
</script><?php /**PATH C:\laragon\www\Polcabot-3\resources\views/components/sidebar.blade.php ENDPATH**/ ?>