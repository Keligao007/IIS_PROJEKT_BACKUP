

<?php $__env->startSection('title', 'admin_moderator_create'); ?>
<?php $__env->startSection('header', 'Tvorba moderatorov'); ?>

<?php $__env->startSection('content'); ?>

<h1>List of Registered Moderators</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- Zmena názvu premennej na $mods -->
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->login); ?></td>
                    <td>
                        <form action="<?php echo e(route('delete_moderator', $user->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this moderator?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


<h1>Pridat Moderatora</h1>
    <div>
        <form action="<?php echo e(route('store_moderator')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <label for="login">Login</label>
            <input type="text" name="login" id="login"><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>

            <input type="submit" value="register moderator">
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views\admin\admin_moderator_create.blade.php ENDPATH**/ ?>