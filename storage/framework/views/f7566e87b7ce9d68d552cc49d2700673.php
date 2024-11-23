

<?php $__env->startSection('title', 'Kategorie'); ?>
<?php $__env->startSection('header', 'Kategorie'); ?>


<?php
if (isset($_SESSION['user']))
{
    //echo "Current user: <strong>" . $_SESSION['user'] . '</strong>';
    //echo '<p><a href="admin.php">Go to admin page</a>';
    //echo '<p><a href="logout.php">Logout</a>';
    ?><h1>SI TU</h1><?php
}
else
{
    ?><h1>NEPRIHLASENY</h1><?php
}
?>

<?php $__env->startSection('content'); ?>
    <!-- <h2>vitajte na nasej stranke</h2> -->

    <h2>Základné kategórie pre stromovú štruktúru</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Meno</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $default_kategorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->meno); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <br />
    <br />

    <h2>Uživateľom prístupné kategórie</h2>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Meno</th>
                <th>Akcie</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $kategorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->meno); ?></td>
                    <td>
                        <a href="<?php echo e(route('show_kategorie_detail', ['id'=> $item->id])); ?>">Spravovať atribúty</a>
                        <form action="<?php echo e(route('delete_kategoria', ['id' => $item->id])); ?>" method="POST" style="display: inline;" onsubmit="return confirm('Naozaj chcete vymazať?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Zmazať</button>
                        </form>
                    </td>
                </tr>
                <?php if($item->atributy->isNotEmpty()): ?>
                    <tr>
                        <td colspan="3">
                            <strong>Atribúty:</strong>
                            <ul>
                                <?php $__currentLoopData = $item->atributy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($attribute->nazov); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.moderator_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views/moderator/mod_kategorie.blade.php ENDPATH**/ ?>