

<?php $__env->startSection('title', 'Detail ovocia'); ?>
<?php $__env->startSection('header', 'Detail ovocia'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Detail ovocia</h1>
    <p>Meno ovocia: <?php echo e($meno); ?></p>

    <!-- Zobraz tu ďalšie atribúty podľa potreby -->
    <a href="<?php echo e(route('moderator_kategorie_ovocie')); ?>">Späť na zoznam</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.moderator_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views\moderator\mod_ovocie_detail.blade.php ENDPATH**/ ?>