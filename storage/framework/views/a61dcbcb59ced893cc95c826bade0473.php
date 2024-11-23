

<?php $__env->startSection('title', 'Ovocie'); ?>
<?php $__env->startSection('header', 'Ovocie'); ?>


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

     <h1>NOVINKA - OVOCIE</h1>

     <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Meno</th>
                <th>Path</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $ovocie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->meno); ?></td>
                    <td><?php echo e($item->path); ?></td>
                    <td><a href="<?php echo e(route('moderator_ovocie_detail', ['meno'=> $item->meno])); ?>">Zobraziť</a></td>
                    <td>
                        <form action="<?php echo e(route('ovocie_destroy', ['id' => $item->id])); ?>" method="POST" onsubmit="return confirm('Naozaj chcete vymazať?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit">Zmazať</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.moderator_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views\moderator\mod_kategorie_ovocie.blade.php ENDPATH**/ ?>