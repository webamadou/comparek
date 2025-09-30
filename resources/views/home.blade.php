@extends('layouts.frontv1')
<x-seo-meta :page="$page ?? []" />
@push('styles')
    @foreach([2,3,5] as $i)
        <link rel="preload" href="{{ asset('frontv1/img/illustration/illust' . $i . '.svg') }}" as="image">
    @endforeach
    <style>
        #hero-illustration {
            transition: opacity .5s ease-in-out;
        }
        #hero-illustration.fade {
            opacity: 0;
        }
    </style>
@endpush
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div id="hero-advertisement">
                <div>
                    <h3>Votre annonce ici!</h3>
                </div>
            </div>
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="badge-wrapper mb-3">
                        <div class="d-inline-flex align-items-center rounded-pill border border-accent-light">
                            <div class="icon-circle me-2">
                                <i class="bi bi-trophy-fill"></i>
                            </div>
                            <span class="badge-text me-3">Comparez. Choisissez. Gagnez.</span>
                        </div>
                    </div>
                    <h1 class="hero-title mb-4">Comparek : Ne Choisissez Plus à l’Aveugle.</h1>

                    <p class="hero-description mb-4">
                        Fini les doutes, les arnaques et les mauvaises surprises. Comparek vous aide à comparer les meilleures
                        offres d’opérateurs, banques, écoles et services au Sénégal, en toute transparence. <br>
                        <strong>Comparez, choisissez, gagnez.</strong>
                    </p>
                    <div class="badge-wrapper mb-3">
                        <div class="d-inline-flex align-items-center rounded-pill border border-accent-light home-phone-badge">
                            <div class="icon-circle me-2">
                                <i class="bi bi-phone"></i>
                            </div>
                            <span class="me-3">+221 33 868 62 00</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image">
                        <img id="hero-illustration" src="{{ asset('frontv1/img/illustration/illust' . $illus . '.svg') }}" alt="Business Growth" class="img-fluid" loading="lazy">
                    </div>
                </div>


                <div class="col-12 row mt-5 pt-0">
                    <div class="col-sm-12 col-md-4 aos-init aos-animate mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="cta-wrapper d-flex justify-content-center">
                            <a href="{{ route('telecoms_comparison') }}" class="btn btn-primary"><span class="iconify" data-icon="mdi-wifi"></span> {{ __('offers.compare_telecom') }}</a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 aos-init aos-animate mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="cta-wrapper d-flex justify-content-center">
                            <a href="{{ route('schools_comparison') }}" class="btn btn-primary"><span class="iconify" data-icon="mdi-account-school"></span> {{ __('schools.comparing_schools') }}</a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 aos-init aos-animate mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="cta-wrapper d-flex justify-content-center">
                            <a href="{{ route('compare_banks') }}" class="btn btn-primary"><span class="iconify" data-icon="mdi-bank"></span> {{ __('banks.comparing_banks') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- Compares invitations section -->
    <section id="services" class="services section mt-0">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center g-5">
                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-wifi"></i>
                        </div>
                        <div class="service-content">
                            <h3>Box & Mobile</h3>
                            <p>Payez moins pour plus de data, d'appels et de services. Comparez les forfaits mobiles et box Internet
                                des opérateurs au Sénégal.</p>
                            <a href="{{ route('telecom_comparison') }}" class="service-link">
                                <span>Comparez web & mobile</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-4" data-aos="fade-left" data-aos-delay="100">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <div class="service-content">
                            <h3>Écoles & Universités</h3>
                            <p>Comparez les écoles supérieures : programmes, diplômes, insertion, coûts… <br>Votre avenir mérite
                                mieux qu’un choix au hasard.</p>
                            <a href="{{ route('schools_comparison') }}" class="service-link">
                                <span>Comparez les écoles</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-4" data-aos="fade-right" data-aos-delay="200">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-bank2"></i>
                        </div>
                        <div class="service-content">
                            <h3>Banques</h3>
                            <p>Évitez les frais cachés. Trouvez le compte, la carte ou le crédit qui vous correspond vraiment.
                                Comparez les banques au Sénégal : frais, services, accessibilité… tout est clair.</p>
                            <a href="{{ route('compare_banks') }}" class="service-link">
                                <span>Comparez les banques</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>
        </div>
    </section>
    <!-- /Compares invitations section -->

    <!-- Services Section -->
    <section id="comparek-score" class="services section" style="background: #461082">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center g-5">
                <div class="col-md-12" data-aos="fade-right" data-aos-delay="100">
                    <div class="service-item">
                        <div class="service-content">
                            <h1>Pas besoin d’être expert : fiez-vous au Comparek Score pour y voir plus clair en un coup d’œil.</h1>
                            <p>Chaque offre reçoit une note de A à E, basée sur des critères objectifs (prix, services, fiabilité…).
                                Simple, transparent et fait pour vous aider à choisir vite — et bien.</p>
                            <a href="#" class="read-more call-action">
                                <span>Trouver les offres les mieux classées</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontv1/img/comparek_score_good.png') }}" alt="comparek score" style="width: 30vw">
                        </div>
                    </div>
                </div><!-- End Service Item -->
            </div>
        </div>
    </section><!-- /Services Section -->

    <!-- How it works Section -->
    <section id="how-we-work" class="how-we-work section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Comment ça marche</h2>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="steps-5">
                    <div class="process-container">
                        <div class="process-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="content">
                                <span class="step-number">01</span>
                                <div class="card-body">
                                    <div class="step-icon">
                                        <img src="{{ asset('frontv1/img/illustration/illust6.png') }}" alt="Explorer vos options" width="80">
                                    </div>
                                    <div class="step-content">
                                        <h3> Explorer vos options</h3>
                                        <p>Plongez immédiatement dans l’univers Comparek : découvrez en un clin d’œil les écoles, banques et opérateurs télécoms qui correspondent à vos besoins.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Process Item -->
                        <div class="process-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="content">
                                <span class="step-number">02</span>
                                <div class="card-body">
                                    <div class="step-icon">
                                        <img src="{{ asset('frontv1/img/illustration/illust7.png') }}" alt="Analyser et comparer" width="80px">
                                    </div>
                                    <div class="step-content">
                                        <h3>Analyser et comparer</h3>
                                        <p>Filtrez et évaluez chaque offre selon des critères personnalisés (prix, qualité, services inclus), pour identifier en toute simplicité les meilleures options du marché.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Process Item -->
                        <div class="process-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="content">
                                <span class="step-number">03</span>
                                <div class="card-body">
                                    <div class="step-icon">
                                        <img src="{{ asset('frontv1/img/illustration/illust8.png') }}" alt="Choisir en toute confiance" width="80px">
                                    </div>
                                    <div class="step-content">
                                        <h3>Choisir en toute confiance</h3>
                                        <p>Bénéficiez d’un résumé clair et d’avis objectifs pour prendre votre décision en toute sérénité et profiter d’avantages exclusifs négociés par Comparek.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="process-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="content">
                                <span class="step-number">04</span>
                                <div class="card-body">
                                    <div class="step-icon">
                                        <img src="{{ asset('frontv1/img/illustration/illust9.png') }}" alt="Choisir en toute confiance" width="80px">
                                    </div>
                                    <div class="step-content">
                                        <h3>Bénéficiez d’un accompagnement personnalisé</h3>
                                        <p>Besoin d’un conseil sur mesure ? Nos experts Comparek sont là pour vous accompagner.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /How We Work Section -->

    <!-- Articles Section -->
    <section id="latest-posts" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('posts.posts') }}</h2>
        </div><!-- End Section Title -->
        <div class="container mb-2">
            <div class="row">
                <!-- big grid -->
                <div class="col-lg-6 mb-4  big-grid" data-aos="fade-right" data-aos-delay="300">
                    <!-- main grid -->
                    @if ($latestPost)
                    <div class="card h-auto shadow">
                        <div class="image-wrapper position-relative">
                             <a href="{{ route('view_article', $latestPost) }}">
                                <img src="{{ $latestPost->imageUrl() }}" alt="{{ $latestPost->name }}" height="60" class="mt-2">
                                <span class="badge mb-2">{{$latestPost->category->name}}</span>
                             </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('view_article', $latestPost) }}"> {{ $latestPost->name }} </a>
                            </h5>
                            <p class="card-text small">{!! Str::words($latestPost->excerpt, 25, '...') !!}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 text-muted small metas">
                                <span><a href="#">{{__('posts.written_by') . ' ' . $latestPost->user?->name}}</a></span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- 4 petites cartes à droite -->
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="row">
                        @foreach($articles as $post)
                            <div class="col-sm-6 mb-4">
                                <x-post-brick :post="$post" />
                            </div>
                        @endforeach
                    </div> <!-- /.row -->
                </div> <!-- /.col-lg-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <!-- /Articles Section -->
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1️⃣ List all your possible indices here
            const images = [2, 3, 5];
            // 2️⃣ Track the current so you don’t repeat immediately
            let current = Number("{{ $illus }}");

            function changeIllustration() {
                let next;
                do {
                    // pick a random element from the array
                    next = images[Math.floor(Math.random() * images.length)];
                } while (next === current);

                current = next;
                // 3️⃣ Build the new src and swap it
                const img = document.getElementById('hero-illustration');
                img.src = `{{ asset('frontv1/img/illustration/illust') }}` + current + '.svg';
            }

            // run it every 15 000ms = 15 s
            setInterval(changeIllustration, 6000);
        });
    </script>
@endpush
