<?php
use Illuminate\Support\Facades\Auth;
?>


<?php $__env->startSection('title', 'admin'); ?>
<?php $__env->startSection('header', 'Hlavna stranka admina'); ?>

<?php $__env->startSection('content'); ?>


<div class="center-text">
          <?php
              // Check if the user is logged in using Auth::check()
              if (Auth::check()) {
                  // If the user is authenticated, display their login name
                  echo "<h3>You are logged in as user: " . htmlspecialchars(Auth::user()->login) . "</h3>";
              } else {
                  // If the user is not authenticated, display a message
                  echo "<h3>You are not logged in.</h3>";
              }
          ?>
      </div>

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
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\test_project\resources\views/admin/admin_view.blade.php ENDPATH**/ ?>