

<?php $__env->startSection('content'); ?>
<style>
    /* === DASHBOARD STYLES === */
    .content h2 {
        font-size: 28px;
        color: #333;
        margin-bottom: 10px;
    }

    .content > p {
        color: #666;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .card-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        margin-top: 30px;
    }

    .card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: center;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.2);
    }

    .card h3 {
        font-size: 18px;
        color: #007bff;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .card p {
        font-size: 36px;
        font-weight: 700;
        color: #333;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 968px) {
        .card-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .card-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<h2>📊 Dashboard</h2>
<p>Selamat datang di halaman dashboard admin PolCaBot.</p>
<p>Di sini Anda dapat memantau statistik sistem chatbot.</p>

<div class="card-grid">
    <div class="card">
        <h3>Total Pengguna</h3>
        <p>124</p>
    </div>
    <div class="card">
        <h3>Total Chat</h3>
        <p>532</p>
    </div>
    <div class="card">
        <h3>Knowledge Base</h3>
        <p>87</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\Polcabot\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>