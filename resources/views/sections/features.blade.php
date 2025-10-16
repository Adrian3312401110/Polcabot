<section id="features">
  <h2 class="features-title">Features</h2>
  <div class="features-container">
    <div class="features-box">
      <div class="features-text">
        <h2>Fitur-Fitur <br> Aplikasi PolCaBot</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
      </div>

      <div class="features-grid">
        @foreach ([
          ['Dark Mode', 'Mode gelap untuk pengalaman nyaman di malam hari.', 'https://cdn-icons-png.flaticon.com/512/702/702814.png'],
          ['Chatbot', 'Chatbot AI cerdas untuk membantu administrasi kampus.', 'https://cdn-icons-png.flaticon.com/512/4712/4712027.png'],
          ['History', 'Riwayat percakapan tersimpan untuk memudahkan akses.', 'https://cdn-icons-png.flaticon.com/512/1828/1828884.png'],
          ['Profile', 'Kelola informasi pengguna dan preferensi pribadi Anda.', 'https://cdn-icons-png.flaticon.com/512/1077/1077063.png']
        ] as $feature)
          <div class="feature-card">
            <div class="icon">
              <img src="{{ $feature[2] }}" alt="{{ $feature[0] }}">
            </div>
            <h3>{{ $feature[0] }}</h3>
            <p>{{ $feature[1] }}</p>
            <a href="#" class="feature-link">View integration →</a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
