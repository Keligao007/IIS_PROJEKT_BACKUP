<?php include_once resource_path('library/header_footer.php'); ?>
<?php use Illuminate\Support\Facades\Auth; ?>

<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title', 'Predvolený nadpis')</title>
</head>
<body>
    <?php make_header('ZATIAL NECHAVAM TENTO HEADER ABY SME MOHLI SKUSAT ADMINA A MODERATORA'); ?>

    <?php
    if (Auth::check()) {
        make_header_login('Vitajte na našej stránke ZELŇAK OFFICIAL');
    } else {
        make_header_unlogin('Vitajte na našej stránke ZELŇAK OFFICIAL');
    }
    ?>

    <main>
        <section>
            @yield('content')
        </section>
    </main>

    <?php make_footer(); ?>
</body>
</html>