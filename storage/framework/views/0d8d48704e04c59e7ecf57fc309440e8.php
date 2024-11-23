

<?php $__env->startSection('title', 'admin'); ?>
<?php $__env->startSection('header', 'Hlavna stranka admina'); ?>

<?php $__env->startSection('content'); ?>

<!-- <h2>vitajte na nasej stranke</h2> -->
<a href="<?php echo e(route('show_users')); ?>">
        <button >Spravovat Uzivatelov</button>
    </a>

    <br />
    <br />
    <br />

    <a href="<?php echo e(route('show_moderators')); ?>">
        <button >Spravovat Moderatorov</button>
    </a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views\admin\admin_view.blade.php ENDPATH**/ ?>