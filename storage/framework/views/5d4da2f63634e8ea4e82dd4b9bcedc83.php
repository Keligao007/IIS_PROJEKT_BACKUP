

<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('header', 'Home'); ?>


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
    <h2>vitajte na nasej stranke</h2>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views\common.blade.php ENDPATH**/ ?>