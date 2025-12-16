
<?php $__env->startSection('title', 'Riwayat Chat | PolCaBot'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header dengan gradient -->
<div class="h-24 bg-gradient-to-r from-blue-600 to-cyan-400"></div>

<!-- Content Area -->
<div class="flex-1 flex flex-col px-8 -mt-12 overflow-hidden">
    <div class="bg-gray-800 rounded-lg shadow-xl p-6 flex flex-col h-full max-w-6xl w-full mx-auto">
        <!-- Header -->
        <div class="mb-6 text-center">
            <h2 class="text-3xl font-bold text-white mb-2">
                📜 Riwayat Chat <span class="text-cyan-400">PolCaBot</span>
            </h2>
            <p class="text-gray-400">Semua percakapan Anda dengan PolCaBot</p>
        </div>

        <?php if($chats->isEmpty()): ?>
            <div class="flex-1 flex items-center justify-center">
                <div class="text-center bg-blue-900/50 rounded-lg p-8 max-w-md">
                    <svg class="w-16 h-16 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <p class="text-gray-300 text-lg">Belum ada riwayat percakapan.</p>
                    <p class="text-gray-500 text-sm mt-2">Mulai chat dengan PolCaBot sekarang!</p>
                </div>
            </div>
        <?php else: ?>
            <!-- Chat Box -->
            <div class="flex-1 overflow-y-auto bg-gray-900/50 rounded-lg p-4 space-y-4">
                <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($chat->sender === 'user'): ?>
                        <!-- User Message -->
                        <div class="flex justify-end">
                            <div class="max-w-2xl">
                                <div class="bg-cyan-500 text-white px-4 py-3 rounded-2xl rounded-tr-sm inline-block">
                                    <?php echo e($chat->message); ?>

                                </div>
                                <div class="text-gray-500 text-xs mt-1 text-right">
                                    <?php echo e($chat->created_at->format('H:i, d M Y')); ?>

                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Bot Message -->
                        <div class="flex justify-start">
                            <div class="max-w-2xl">
                                <div class="bg-gray-700 text-white px-4 py-3 rounded-2xl rounded-tl-sm inline-block border border-gray-600">
                                    <?php echo nl2br(e($chat->message)); ?>

                                </div>
                                <div class="text-gray-500 text-xs mt-1">
                                    <?php echo e($chat->created_at->format('H:i, d M Y')); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <!-- Back Button -->
        <div class="mt-6 text-center">
            <a href="/" class="inline-flex items-center space-x-2 bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-lg transition font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Kembali ke Chat</span>
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\Polcabot\resources\views/pages/history.blade.php ENDPATH**/ ?>