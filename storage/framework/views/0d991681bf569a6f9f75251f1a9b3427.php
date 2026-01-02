<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    
    <!-- Alert Success/Error Messages -->
    <?php if(session('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
    
    <?php if(session('error')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>

    <!-- Header dengan Search dan Tombol Add -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">Beasiswa</h2>
        
        <div class="flex items-center gap-4">
            <!-- Search Bar -->
            <form action="<?php echo e(route('admin.beasiswa.index')); ?>" method="GET" class="relative">
                <input 
                    type="text" 
                    name="search"
                    value="<?php echo e(request('search')); ?>"
                    placeholder="cari disini..." 
                    class="border border-gray-300 rounded-lg px-4 py-2 pr-10 focus:outline-none focus:border-blue-500"
                >
                <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>
            
            <!-- Filter Icon (Optional - belum ada fungsi) -->
            <button class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
            </button>
            
            <!-- Tombol Add New Dataset -->
            <a href="<?php echo e(route('admin.beasiswa.create')); ?>" 
               class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-medium">
                ADD NEW DATASET
            </a>
        </div>
    </div>
    
    <!-- Table -->
    <div class="bg-white rounded-lg overflow-hidden">
        <!-- Table Header -->
        <div class="grid grid-cols-12 gap-4 px-4 py-3 bg-gray-50 border-b text-sm font-medium text-gray-600">
            <div class="col-span-1">Number</div>
            <div class="col-span-3">Question</div>
            <div class="col-span-3">Answer</div>
            <div class="col-span-3">Source</div>
            <div class="col-span-1">Date of addition</div>
            <div class="col-span-1"></div>
        </div>
        
        <!-- Table Rows -->
        <?php $__empty_1 = true; $__currentLoopData = $datasets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="grid grid-cols-12 gap-4 px-4 py-4 border-2 border-blue-300 rounded-lg mb-2 mx-2 mt-2 items-center">
            <!-- Number -->
            <div class="col-span-1 text-center font-medium">
                <?php echo e($datasets->firstItem() + $index); ?>.
            </div>
            
            <!-- Question -->
            <div class="col-span-3 text-sm">
                <?php echo e($data->question); ?>

            </div>
            
            <!-- Answer -->
            <div class="col-span-3 text-sm">
                <?php echo e($data->answer); ?>

            </div>
            
            <!-- Source (Link) -->
            <div class="col-span-3 text-sm">
                <a href="<?php echo e($data->source); ?>" 
                   target="_blank" 
                   class="text-blue-600 hover:underline break-all">
                    <?php echo e(Str::limit($data->source, 50)); ?>

                </a>
            </div>
            
            <!-- Date -->
            <div class="col-span-1 text-sm text-center">
                <?php echo e(\Carbon\Carbon::parse($data->created_at)->format('d-M-Y')); ?>

            </div>
            
            <!-- Action Buttons (Edit & Delete) -->
            <div class="col-span-1 flex gap-2 justify-end">
                <!-- Edit Button -->
                <a href="<?php echo e(route('admin.beasiswa.edit', $data->id)); ?>" 
                   class="text-yellow-500 hover:text-yellow-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                </a>
                
                <!-- Delete Button -->
                <form action="<?php echo e(route('admin.beasiwa.destroy', $data->id)); ?>" 
                      method="POST" 
                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="text-red-500 hover:text-red-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <!-- Jika tidak ada data -->
        <div class="text-center py-8 text-gray-500">
            Tidak ada data yang ditemukan.
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4 px-2">
        <p class="text-sm text-gray-600">
            Showing <?php echo e($datasets->firstItem() ?? 0); ?> to <?php echo e($datasets->lastItem() ?? 0); ?> of <?php echo e($datasets->total()); ?> entries
        </p>
        <div class="flex gap-2">
            <?php echo e($datasets->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Polcabot-9\resources\views/admin/beasiswa/index.blade.php ENDPATH**/ ?>