

<?php $__env->startSection('title', 'Moderator'); ?>
<?php $__env->startSection('header', 'Moderator'); ?>


<?php
if (isset($_SESSION['user']))
{
    //echo "Current user: <strong>" . $_SESSION['user'] . '</strong>';
    //echo '<p><a href="admin.php">Go to admin page</a>';
    //echo '<p><a href="logout.php">Logout</a>';
}
else
{

}
?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('moderator_kategorie')); ?>">
        <button >Spravovať kategórie</button>
    </a>

    <br />
    <br />
    <br />

    <a href="<?php echo e(route('moderator_navrhy')); ?>">
        <button >Návrhy uživateľov</button>
    </a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.moderator_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views/moderator/moderator.blade.php ENDPATH**/ ?>