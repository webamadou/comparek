<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Comparek') }}</title>

        <!-- Favicons -->
        <link rel="icon" type="image/png" href="{{asset('assets/logo/front-favicons/android-icon-96x96.png')}}" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="{{asset('assets/logo/front-favicons/apple-icon.png')}}" />
        <link rel="shortcut icon" href="{{asset('assets/logo/front-favicons/favicon.ico')}}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/logo/front-favicons/apple-icon-60x60.png')}}" />

        <meta name="msapplication-TileColor" content="#ff5600">
        <meta name="msapplication-TileImage" content="{{ asset('frontv1/favicons/apple-icon-57x57.png') }}">
        <meta name="theme-color" content="#323232">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

        <script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
        <!-- Vendor CSS Files -->
        <link href="{{ asset('frontv1/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontv1/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('frontv1/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('frontv1/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontv1/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Main CSS File -->
        <link href="{{ asset('frontv1/css/main.css') }}" rel="stylesheet">
        @stack('styles')
        @vite('resources/js/app.js')
    </head>
    <body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Comparek</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li class="dropdown">
                        <a href="{{ route('home') }}" class="active">
                            <span><strong class="bi bi-bullseye"></strong> {{ __('commons.home') }}</span></a>
                    </li>
                    <li class="dropdown"><a href="#"><span><strong class="bi bi-wifi"></strong> Box & Mobile</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('list_operators') }}">Liste des opérateurs</a></li>
                            <li><a href="{{ route('telecom_comparison') }}">Comparateur d'offres internet</a></li>
                            <li><a href="{{ route('telecom_pass_comparison') }}">Comparateur d'offres mobile</a></li>
                            <li><a href="{{ route('telecom_scores') }}">Scores des offres</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span><strong class="bi bi-mortarboard-fill"></strong>  Écoles</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('index_schools') }}">Grandes Écoles & Université</a></li>
                            <li><a href="{{ route('index_schools') }}"></a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span><strong class="bi bi-bank2"></strong> Banques</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#"> .... </a></li>
                            <li><a href="#"> .... </a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#pre-footer"><span><strong class="bi bi-envelope-at-fill"></strong> Contact</span></a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer light-background">

        <!-- Contact Section -->
        <section  class="contact section" id="pre-footer">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 mb-5">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-card">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <h3>Notre adresse</h3>
                            <p>Ouakam Aeroport, Lot N 76, Dakar, Senegal</p>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-card">
                            <div class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <h3>Contactez - Nous</h3>
                            <p>Mobile: +221 77 269 35 16<br>
                                Email: contact@comparek.sn</p>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="info-card">
                            <div class="icon-box">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <h3>Réseaux sociaux</h3>
                            <div class="pre-footer">
                                <a href="https://www.linkedin.com/company/comparek" class="btn" target="_blank"><span class="bi bi-linkedin"></span></a>
                                <a href="https://tiktok.com/comparek" class="btn" target="_blank"><span class="bi bi-tiktok"></span></a>
                                <a href="https://instagram.com/comparek_sn" class="btn" target="_blank"><span class="bi bi-instagram"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Contact Section -->

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Comparek</strong></p>
            <div class="credits">
                par <a href="https://comparek.sn/">Comparek</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <span style="display: none"><a href="https://storyset.com/education">Education illustrations by Storyset</a></span>
    <!-- Preloader -->
    <div id="preloader"></div>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('frontv1/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontv1/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('frontv1/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontv1/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontv1/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontv1/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontv1/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('frontv1/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontv1/js/main.js') }}"></script>
    @stack('scripts')

    </body>
</html>
