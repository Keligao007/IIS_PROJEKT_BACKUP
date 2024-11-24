<?php include_once resource_path('library/header_footer.php'); ?>

<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title', 'Moderator')</title>
</head>
<body>
    <?php make_header_moderator('Moderator'); ?>

    <header>
        <div class="nav">
            <h2>Moderátor može spravovať kategórie, spravovať návrhy uživatelov, a dalšie. Pre začiatok prosím stlačte jedno z dvoch tlačidiel.</h2>
        </div>
    </header>

    <main>
        <section style="margin: 20px; padding: 20px;">
            @yield('content')
        </section>
    </main>

    <?php make_footer(); ?>
</body>
</html>