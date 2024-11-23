<!DOCTYPE html> 
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.style.css">
        <title>@yield('title', 'Predvolený nadpis')</title>
    </head>
  <body>
        <head>
            <h1>@yield('header', 'Predvolený hlavný nadpis stránky')</h1>
            <!-- <h1>LAYOUT STRANKA</h1> -->
        </head>

        <!-- @include('layout.nav') -->

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
                @yield('content')
            </section>

        </main>

        <footer> 
            
            &copy; KELIGAO

        </footer>
    </body>
</html>