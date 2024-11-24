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
    <title>@yield('title', 'Home')</title>
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

        <section>
            <div class="slider">
                <div class="slides">
                    <img src="{{ asset('images/b.jpg') }}" alt="Image 1">
                    <img src="{{ asset('images/h.jpg') }}" alt="Image 2">
                    <img src="{{ asset('images/o.jpg') }}" alt="Image 3">
                    <img src="{{ asset('images/r.jpg') }}" alt="Image 4">
                    <img src="{{ asset('images/t.jpg') }}" alt="Image 5">
                </div>
                <div class="slider-buttons">
                    <button class="slider-button" id="prev"><i class="fas fa-arrow-left"></i></button>
                    <button class="slider-button" id="next"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </section>

        <section class="project-description">
            <h2>O našom projekte</h2>
            <p>
                ZELŇÁK OFFICIAL je študentská stránka vytvorená v rámci projektu IIS. Stránka umožňuje objednávanie zeleniny a ovocia od lokálnych farmárov.
                Poskytuje možnosť organizovať samozbery. Obsahuje rôzne užívateľské role: administrátor, moderátor, registrovaný a neregistrovaný používateľ.</li>
                Prosím dbajte na to, že ide o edukačný projekt, nie komerčnú platformu.
            </p>
        </section>

        <section>
            <a href="{{ route('suggestions.create') }}" class="btn btn-primary">Make a Suggestion</a>
        </section>
        <section>
            <a href="{{ route('samozber.index') }}" class="btn btn-primary">View Samozber List</a>
        </section>
        <section>
            <a href="{{ route('samozber.create') }}" class="btn btn-primary">Add samozber</a>
        </section>
    </main>

    <script>
        const slides = document.querySelector('.slides');
        const images = document.querySelectorAll('.slides img');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        let currentIndex = 0;

        function showSlide(index) {
            if (index >= images.length) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = images.length - 1;
            } else {
                currentIndex = index;
            }
            slides.style.transform = `translateX(${-currentIndex * 100}%)`;
        }

        prevButton.addEventListener('click', () => {
            showSlide(currentIndex - 1);
        });

        nextButton.addEventListener('click', () => {
            showSlide(currentIndex + 1);
        });
    </script>

    <?php make_footer(); ?>
</body>
</html>