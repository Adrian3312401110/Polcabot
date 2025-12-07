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
        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>" class="btn-main">Get Started</a>
        <?php endif; ?>

        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('dashboard')); ?>" class="btn-main">Get Started</a>
        <?php endif; ?>
    </div>
</section><?php /**PATH C:\laragon\www\Polcabot-8\resources\views/components/home.blade.php ENDPATH**/ ?>