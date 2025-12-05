<?php $__env->startSection('title', 'Dashboard - PolCaBot'); ?>

<?php $__env->startSection('dashboard-content'); ?>
<div class="main-content" id="mainContent">
  <div class="welcome-section">
    <h1>Selamat Datang di <span class="text-sky-600 font-bold">PolCaBot</span></h1>
    <p>Hai <?php echo e($user->name ?? 'User'); ?>, PolCaBot siap membantu menjawab segala pertanyaan akademik dari Kampus Polibatam</p>

    <div class="quick-actions grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-6">
      <?php $__currentLoopData = $quickActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="action-card cursor-pointer hover:shadow-lg transition border rounded-lg p-4"
             onclick="startChat('<?php echo e($action['title']); ?>')">
          <h3 class="text-sky-600 font-semibold"><?php echo e($action['title']); ?></h3>
          <p class="text-gray-600 text-sm"><?php echo e($action['description']); ?></p>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-content'); ?>
<?php echo $__env->make('components.chatbot', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<script>
async function startChat(question) {
  const res = await fetch('<?php echo e(route("chat.create")); ?>', {
    method: 'POST',
    headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' }
  });
  const data = await res.json();
  window.location.href = `/chat/${data.chat_id}?message=${encodeURIComponent(question)}`;
}

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Polcabot-6\Polcabot-6\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>