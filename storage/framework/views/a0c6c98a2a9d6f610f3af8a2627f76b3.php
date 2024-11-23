<!DOCTYPE html> 
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.style.css">
        <title><?php echo $__env->yieldContent('title', 'Predvolený nadpis'); ?></title>
    </head>
  <body>
        <head>
            <h1><?php echo $__env->yieldContent('header', 'Predvolený hlavný nadpis stránky'); ?></h1>
            <!-- <h1>LAYOUT STRANKA</h1> -->
        </head>

        <!-- <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->

        <header>
        <div class="nav">
            <ul class="">
                <li><a>Meno</a></li>
                <li><a href="<?php echo url('/'); ?>">Odhlásiť</a></li>
                <!-- totdo, ked sa odhlasi tak nech je odhlaseny -->
                 <!-- <h2>Tento list je header, treba naformatovat</h2> -->
            </ul>
        </div>
        </header>

        <main>

            <section>
                <?php echo $__env->yieldContent('content'); ?>
            </section>

        </main>

        <footer> 
            
            &copy; KELIGAO

        </footer>
    </body>
</html><?php /**PATH C:\xampp\htdocs\dashboard\test_project\test_project\resources\views/layout/adminlayout.blade.php ENDPATH**/ ?>