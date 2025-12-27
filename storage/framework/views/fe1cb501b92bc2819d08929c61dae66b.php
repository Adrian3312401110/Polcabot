<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | PolCaBot</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- ✅ TAMBAHKAN TAILWIND CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f3f6fa;
            display: flex;
            height: 100vh;
        }

        /* === NAVBAR === */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 65px;
            background: linear-gradient(90deg, #007bff, #00aaff);
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        /* --- Kiri: Logo --- */
        .brand {
            font-size: 22px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* --- Tengah: Search bar (di tengah navbar) --- */
        .navbar-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
        }

        .navbar-center input {
            width: 380px;
            max-width: 400px;
            padding: 9px 15px;
            border-radius: 10px;
            border: none;
            outline: none;
            box-shadow: 0 0 6px rgba(0,0,0,0.15);
        }

        /* --- Kanan: Profil Admin (digeser ke kiri) --- */
        .navbar-right {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            margin-right: 60px;
        }

        .navbar-right span {
            font-weight: 500;
        }

        .navbar-right img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid #fff;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
            object-fit: cover;
        }

        /* === DROPDOWN PROFILE === */
        .dropdown {
            position: absolute;
            top: 58px;
            right: 0;
            background: white;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            display: none;
            flex-direction: column;
            min-width: 180px;
            overflow: hidden;
            animation: fadeIn 0.2s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-5px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .dropdown a {
            padding: 12px 16px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            transition: background 0.2s;
        }

        .dropdown a:hover {
            background-color: #f4f4f4;
        }

        /* === SIDEBAR === */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            height: 100vh;
            background: linear-gradient(180deg, #007bff, #0099ff);
            display: flex;
            flex-direction: column;
            padding-top: 80px;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
            z-index: 999;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 13px 22px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            gap: 10px;
            transition: background 0.3s, padding-left 0.2s;
        }

        .sidebar a:hover {
            background-color: rgba(0,0,0,0.15);
            padding-left: 26px;
        }

        .sidebar a.active {
            background-color: #005fcc;
        }

        /* === MAIN CONTENT === */
        .content {
            margin-left: 230px;
            padding: 90px 35px 30px 35px;
            width: calc(100% - 230px);
            overflow-y: auto;
        }

        /* === DASHBOARD CARDS === */
        .content h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        .content p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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

        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            .navbar-center input {
                width: 250px;
            }

            .navbar-right {
                margin-right: 30px;
            }

            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
                width: calc(100% - 200px);
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <div class="navbar">
        <div class="brand">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="PolCaBot Logo" style="width:42px;height:42px;border-radius:8px;object-fit:cover;">
            PolCaBot
        </div>

        

            <div class="navbar-right" id="profileMenu">
                <span>Hi, <?php echo e(Auth::user()->username); ?></span>

                <img
                    src="<?php echo e(Auth::user()->profile_photo
                        ? asset('storage/profile/' . Auth::user()->profile_photo)
                        : 'https://cdn-icons-png.flaticon.com/512/4712/4712107.png'); ?>"
                    alt="Admin">

            <div class="dropdown" id="dropdownMenu">
                <a href="<?php echo e(route('admin.profile')); ?>">🧑‍💼 Ubah Profil</a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">🚪 Logout</a>
            </div>
        </div>
        
        <!-- Form Logout (Hidden) -->
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>">📊 Dashboard</a>
        <a href="<?php echo e(route('admin.knowledge')); ?>" class="<?php echo e(request()->is('admin/knowledge*') || request()->is('admin/organisasi*') ? 'active' : ''); ?>">📚 Knowledge Base</a>
        <a href="<?php echo e(route('admin.training')); ?>" class="<?php echo e(request()->is('admin/training') ? 'active' : ''); ?>">🧠 Training AI</a>
        
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script>
        // Dropdown toggle
        const profileMenu = document.getElementById('profileMenu');
        const dropdown = document.getElementById('dropdownMenu');

        profileMenu.addEventListener('click', () => {
            dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
        });

        // Klik di luar dropdown -> tutup
        document.addEventListener('click', (e) => {
            if (!profileMenu.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>
</body>
</html><?php /**PATH C:\laragon\www\Polcabot\resources\views/admin/layout.blade.php ENDPATH**/ ?>