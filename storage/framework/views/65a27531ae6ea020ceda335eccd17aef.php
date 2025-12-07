<section id="contact">
    <div class="contact-wrapper">
        <div class="contact-form">
            <h2>Contact Us</h2>
            <p class="subtext">Feel free to contact us at anytime. We will get back as soon as possible.</p>
            
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            
            <form action="<?php echo e(route('contact.submit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <input type="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <textarea name="message" placeholder="Message" required><?php echo e(old('message')); ?></textarea>
                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <button type="submit">Send</button>
            </form>
        </div>
        
        <div class="contact-info">
            <h3>Info</h3>
            <p>📧 Info@gmail.com</p>
            <p>📞 +9955442318</p>
            <p>👤 John</p>
            <p>🕒 08:56</p>
            <div class="social-icons">
                <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
                <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"></a>
                <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google"></a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\Polcabot-8\resources\views/components/contact.blade.php ENDPATH**/ ?>