

<?php $__env->startSection('title', 'LogIn'); ?>
<?php $__env->startSection('header', 'LogIn Používateľa'); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <form action="<?php echo e(route('login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <label for="login">Login</label>
            <input type="text" name="login" id="login"><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>

            <input type="submit" value="Log in">
        </form>
    </div>
    
    <!-- <p><a href="<?php echo e(url('/')); ?>">Back</a></p> -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views\log_in.blade.php ENDPATH**/ ?>