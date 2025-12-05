

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <div class="bg-white rounded-lg shadow-md p-6">
        
        <!-- Header -->
        <h2 class="text-2xl font-bold mb-6">Tambah Dataset Jurusan Baru</h2>
        
        <!-- Form -->
        <form action="<?php echo e(route('admin.jurusan.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <!-- Field: Question (Pertanyaan) -->
            <div class="mb-4">
                <label for="question" class="block text-sm font-medium text-gray-700 mb-2">
                    Pertanyaan <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="question" 
                    name="question" 
                    rows="3"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 <?php echo e($errors->has('question') ? 'border-red-500' : 'border-gray-300'); ?>"
                    placeholder="Contoh: Apakah ada jurusan yang berfokus pada olahraga?"
                    required
                ><?php echo e(old('question')); ?></textarea>
                
                <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <!-- Field: Answer (Jawaban) -->
            <div class="mb-4">
                <label for="answer" class="block text-sm font-medium text-gray-700 mb-2">
                    Jawaban <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="answer" 
                    name="answer" 
                    rows="4"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 <?php echo e($errors->has('answer') ? 'border-red-500' : 'border-gray-300'); ?>"
                    placeholder="Contoh: Ada, yaitu Komite Olahraga POlibatam"
                    required
                ><?php echo e(old('answer')); ?></textarea>
                
                <?php $__errorArgs = ['answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <!-- Field: Source (URL Sumber) -->
            <div class="mb-6">
                <label for="source" class="block text-sm font-medium text-gray-700 mb-2">
                    Sumber (URL) <span class="text-red-500">*</span>
                </label>
                <input 
                    type="url" 
                    id="source" 
                    name="source" 
                    value="<?php echo e(old('source')); ?>"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 <?php echo e($errors->has('source') ? 'border-red-500' : 'border-gray-300'); ?>"
                    placeholder="https://www.instagram.com/komiteolahragapolibatam/"
                    required
                >
                
                <?php $__errorArgs = ['source'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <!-- Buttons -->
            <div class="flex justify-end gap-3">
                <!-- Tombol Batal -->
                <a href="<?php echo e(route('admin.jurusan.index')); ?>" 
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors">
                    Batal
                </a>
                
                <!-- Tombol Simpan -->
                <button 
                    type="submit" 
                    class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                    Simpan Dataset
                </button>
            </div>
        </form>
        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Polcabot-6\Polcabot-6\resources\views/admin/jurusan/create.blade.php ENDPATH**/ ?>