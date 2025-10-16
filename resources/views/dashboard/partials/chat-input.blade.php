<div class="chat-input-container">
    <div class="chat-input">
        <input type="text" id="chatMessage" placeholder="Ketik Pertanyaaan...">
        <button onclick="sendMessage()">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
            </svg>
        </button>
    </div>
</div>

<script>
function sendMessage() {
    const message = document.getElementById('chatMessage').value;
    if (!message.trim()) return;
    
    fetch('{{ route("chat.send") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message: message })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response:', data);
        document.getElementById('chatMessage').value = '';
        // Display response in UI
    })
    .catch(error => console.error('Error:', error));
}

// Send on Enter key
document.getElementById('chatMessage').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});
</script>