

<?php $__env->startSection('title', 'Navrhy'); ?>
<?php $__env->startSection('header', 'Navrhy'); ?>


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
    <!-- <h2>vitajte na nasej stranke</h2> -->
     <h1>Navrhy</h1>

     // todo, zobrazit tabulku s navrhmi (ponuka)

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.moderator_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views/moderator/mod_narvhy.blade.php ENDPATH**/ ?>