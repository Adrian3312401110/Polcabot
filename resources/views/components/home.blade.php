<section id="home">
    <div class="home-content">
        <h1>
            Selamat Datang di
            <span style="color:white;">P</span><span style="color:orange;">o</span><span style="color:white;">l</span><span style="color:#1e90ff;">CaBot</span>
        </h1>
        <p class="tagline">
            PolCaBot adalah aplikasi chatbot berbasis AI yang dirancang untuk membantu menjawab pertanyaan seputar akademik dan administrasi kampus.
        </p>

        <!-- Tombol Get Started: arahkan ke LOGIN kalau belum login, ke DASHBOARD kalau sudah login -->
        @guest
            <a href="{{ route('login') }}" class="btn-main">Get Started</a>
        @endguest

        @auth
            <a href="{{ route('dashboard') }}" class="btn-main">Get Started</a>
        @endauth
    </div>
</section>