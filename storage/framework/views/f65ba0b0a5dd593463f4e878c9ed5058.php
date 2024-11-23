

<?php $__env->startSection('title', 'admin_user_handle'); ?>
<?php $__env->startSection('header', 'Uzivatelia'); ?>

<?php $__env->startSection('content'); ?>

    <h1>List of Registered Users</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->login); ?></td>
                    <td>
                        <!-- Delete Form -->
                        <form action="<?php echo e(route('delete_user', $user->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views/admin/admin_users.blade.php ENDPATH**/ ?>