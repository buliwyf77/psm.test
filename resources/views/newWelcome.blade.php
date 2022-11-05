<!DOCTYPE html>
<html lang="" {{ str_replace('_', '-', app()->getLocale()) }}"">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="#page-top">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-primary bg-gradient text-white">
        <div class="container px-4 text-center">
            <h1 class="fw-bolder">{{ config('app.name', 'Laravel') }}</h1>
            <p class="lead">Prueba de código en Laravel para PSM por Luis Torrealba</p>
            <a class="btn btn-lg btn-light" href="#about">Continuar</a>
        </div>
    </header>
    <!-- About section-->
    <section id="about">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>Sobre este proyecto</h2>
                    <p class="lead">Este proyecto ha sido generado para demostrar las habilidades de Luis Torrealba en los siguientes aspectos:</p>
                    <ul>
                        <li>Crear Apps en Laravel desde cero</li>
                        <li>Conectar a Base de datos</li>
                        <li>Crear modelos efectivos para interactuar con el ORM Eloquent</li>
                        <li>Usar jQuery y Ajax para peticiones asincronicas</li>
                        <li>Aplicacion de Tema y colores</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section-->
    <section class="bg-light" id="services">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>Como Usar</h2>
                    <p class="lead">
                        
<strong>Para probar la aplicacion, siga los siguientes pasos:</strong>


<ol>
<li>Clonar Repo https://github.com/buliwyf77/psm.test.git</li>

<li>Crear una base de datos en mySQL con los siguientes datos:<br>
DB_DATABASE=psm.test<br>
DB_USERNAME=psm.test<br>
DB_PASSWORD=psm.test<br>
</li>


<li>dentro de la carpeta psm.test ejecutar los siguientes comandos en el mismo orden</li>

<li>composer install</li>

<li>npm install</li>

<li>npm run development (dos veces, para estar seguro)</li>

<li>php artisan migrate</li>

<li>php artisan serve</li>

<li>entrar en http://127.0.0.1:8000 y registrarse</li>

</ol>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section-->
    <section id="contact">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>Más Información</h2>
                    <p class="lead">Cualquier duda puede contactarme en <a href=mailto:luis@luistorrealba.com>luis@luistorrealba.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; Luis Torrealba 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script>
        window.addEventListener('DOMContentLoaded', event => {

            // Activate Bootstrap scrollspy on the main nav element
            const mainNav = document.body.querySelector('#mainNav');
            if (mainNav) {
                new bootstrap.ScrollSpy(document.body, {
                    target: '#mainNav',
                    offset: 74,
                });
            };

            // Collapse responsive navbar when toggler is visible
            const navbarToggler = document.body.querySelector('.navbar-toggler');
            const responsiveNavItems = [].slice.call(
                document.querySelectorAll('#navbarResponsive .nav-link')
            );
            responsiveNavItems.map(function(responsiveNavItem) {
                responsiveNavItem.addEventListener('click', () => {
                    if (window.getComputedStyle(navbarToggler).display !== 'none') {
                        navbarToggler.click();
                    }
                });
            });

        });
    </script>
</body>

</html>