

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

    

<div>
    <form action="<?php echo e(route('logout')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="submit" value="Log out">
    </form>
</div>



 <!-- -------- MOJE -->
<div style="margin-bottom: 20px; text-align: center;">
    <form method="GET" action="<?php echo e(route('index')); ?>" style="display: inline-block;">
        <label>
            <input type="checkbox" name="kategorie[]" value="2" 
                <?php echo e(in_array(2, request('kategorie', [])) ? 'checked' : ''); ?>>
            Ovocie
        </label>
        <label>
            <input type="checkbox" name="kategorie[]" value="3"
                <?php echo e(in_array(3, request('kategorie', [])) ? 'checked' : ''); ?>>
            Zelenina
        </label>
        <button type="submit" style="margin-left: 10px;">Filtrovať</button>
    </form>
</div>


<div style="display: flex; flex-direction: column; align-items: center; gap: 20px; margin-top: 20px;">
    <?php $__currentLoopData = $nabidky; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nabidka): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="border: 1px solid #ddd; padding: 20px; width: 50%; border-radius: 10px; background-color: #f9f9f9;">
            <h2 style="text-align: center;"><?php echo e($nabidka->meno); ?></h2>
            <div>
                <?php if($nabidka->nabidka_atribut && $nabidka->nabidka_atribut->isNotEmpty()): ?>
                    <ul style="list-style: none; padding: 0;">
                        <?php $__currentLoopData = $nabidka->nabidka_atribut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atribut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li style="margin-bottom: 10px;">
                                <strong><?php echo e($atribut->atribut->nazov ?? 'Neznámy atribút'); ?>:</strong>
                                <?php echo e($atribut->hodnota ?? 'N/A'); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <p style="text-align: center; color: #888;">Žiadne atribúty</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views/common.blade.php ENDPATH**/ ?>