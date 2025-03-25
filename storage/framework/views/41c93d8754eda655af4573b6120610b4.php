    <?php if($label): ?>
    <label for="<?php echo e($name); ?>"><b><?php echo e($label); ?></b></label>
    <?php endif; ?>
    <input type="<?php echo e($type); ?>" placeholder="<?php echo e($placeholder); ?>" value="<?php echo e($value); ?>" name="<?php echo e($name); ?>" id="<?php echo e($id); ?>" >
    <?php if($errors->has($name)): ?>
    <span class="error"><?php echo e($errors->first($name)); ?></span>
    <br>
    <br>
    <?php endif; ?><?php /**PATH D:\xampp\htdocs\gates-policies\resources\views/components/input-field.blade.php ENDPATH**/ ?>