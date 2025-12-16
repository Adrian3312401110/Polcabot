document.addEventListener("DOMContentLoaded", () => {
    loadHistory();
    setupNewChatButton();
    setupSearchHistory();
});


// ===============================
// 🔵  LOAD HISTORY CHAT
// ===============================
function loadHistory() {
    fetch('/api/chat/conversations')
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById('historyList');
            list.innerHTML = '';

            if (data.length === 0) {
                list.innerHTML = "<p class='empty'>Belum ada history</p>";
                return;
            }

            data.forEach(conv => {
                const item = document.createElement('div');
                item.classList.add('history-item');
                item.dataset.id = conv.id;

                item.innerHTML = `
                    <div class="history-title">${conv.title}</div>
                    <div class="history-last">${conv.lastMessage ?? ''}</div>
                `;

                // Klik → menuju halaman chat
                item.addEventListener('click', () => {
                    window.location.href = `/chat/${conv.id}`;
                });

                list.appendChild(item);
            });
        })
        .catch(err => {
            console.error("Gagal mengambil history:", err);
        });
}



// ===============================
// 🟢  BUAT CHAT BARU
// ===============================
function setupNewChatButton() {
    const newChatBtn = document.getElementById('newChatBtn');

    if (!newChatBtn) return;

    newChatBtn.addEventListener("click", () => {
        fetch('/api/chat/conversations/new', {
            method: "POST",
            headers: { "Content-Type": "application/json" },
        })
            .then(res => res.json())
            .then(data => {
                // Redirect ke halaman chat baru
                window.location.href = `/chat/${data.id}`;
            })
            .catch(err => console.error("Gagal membuat chat baru:", err));
    });
}



// ===============================
// 🟣  FITUR SEARCH HISTORY
// ===============================
function setupSearchHistory() {
    const searchInput = document.getElementById('searchHistory');
    const list = document.getElementById('historyList');

    if (!searchInput) return;

    searchInput.addEventListener("input", () => {
        const keyword = searchInput.value.toLowerCase();
        const items = list.querySelectorAll(".history-item");

        items.forEach(item => {
            const title = item.querySelector(".history-title").innerText.toLowerCase();
            const lastMsg = item.querySelector(".history-last").innerText.toLowerCase();

            if (title.includes(keyword) || lastMsg.includes(keyword)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    });
}
