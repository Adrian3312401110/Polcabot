

<?php $__env->startSection('content'); ?>
<style>
    /* --- Container utama --- */
    .profile-wrapper {
        background: #f1f5f9; /* abu muda seperti dashboard */
        padding: 40px;
        min-height: 100vh;
    }

    .profile-card {
        max-width: 700px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.05);
        padding: 40px 50px;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 20px;
    }

    .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        border: 3px solid #0099ff;
        object-fit: cover;
        background: #f0f8ff;
    }

    .profile-header h3 {
        margin: 0;
        font-size: 22px;
        color: #333;
        font-weight: 700;
    }

    .profile-header p {
        margin: 3px 0 0;
        color: #666;
        font-size: 15px;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        display: block;
    }

    .form-control {
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 12px 14px;
        font-size: 15px;
        margin-bottom: 18px;
        outline: none;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        border-color: #0099ff;
        box-shadow: 0 0 4px rgba(0,153,255,0.3);
    }

    .btn-save {
        background: #0099ff;
        color: white;
        font-weight: 600;
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .alert-info {
        text-align: center;
        background: #e7f4ff;
        color: #007bff;
        border: 1px solid #b3e0ff;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 25px;
        font-size: 14px;
    }

    /* Tambahan animasi halus */
    .profile-card {
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="profile-wrapper">
    <div class="profile-card">
        <div class="profile-header">
            <img
                src="<?php echo e($user->profile_photo
                    ? asset('storage/profile/' . $user->profile_photo) . '?v=' . time()
                    : 'https://cdn-icons-png.flaticon.com/512/4712/4712107.png'); ?>"
                class="profile-avatar"
                alt="Admin">

            <div>
                <h3><?php echo e($user->username); ?></h3>
                <p><?php echo e($user->email); ?></p>
            </div>
        </div>

        <?php if(session('success')): ?>
            <div class="alert-info">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert-info" style="color:red;">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.profile.update')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <label class="form-label">Nama</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="<?php echo e(old('name', $user->username)); ?>">

            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?php echo e($user->email); ?>" readonly>

            <label class="form-label">Password Baru</label>
            <input type="password" name="password" class="form-control" placeholder="Password baru">
            <small style="color:#666">
            Kosongkan password jika tidak ingin mengubah
            </small>

            <label class="form-label">Konfirmasi Password</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="Konfirmasi password">

            <label class="form-label">Foto Profil</label>
            <input type="file" name="profile_photo" class="form-control">

            <div style="text-align:center; margin-top:25px;">
                <button type="submit" class="btn-save" style="cursor:pointer; opacity:1;">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Polcabot\resources\views/admin/profile.blade.php ENDPATH**/ ?>