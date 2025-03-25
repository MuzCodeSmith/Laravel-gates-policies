<form action="<?php echo e($action); ?>"  method="<?php echo e($method === 'GET' ? 'GET' : 'POST'); ?>" class="form-box">
    <?php echo csrf_field(); ?>
    <?php if($method !== 'GET' && $method !== 'POST'): ?>
        <?php echo method_field($method); ?>
    <?php endif; ?>
    <?php echo e($slot); ?>

</form>

<?php /**PATH D:\xampp\htdocs\gates-policies\resources\views/components/form.blade.php ENDPATH**/ ?>