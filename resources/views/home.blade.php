@extends('layouts.frontv1')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="badge-wrapper mb-3">
                        <div class="d-inline-flex align-items-center rounded-pill border border-accent-light">
                            <div class="icon-circle me-2">
                                <i class="bi bi-bell"></i>
                            </div>
                            <span class="badge-text me-3">Solutions Innovatives</span>
                        </div>
                    </div>
                    <h1 class="hero-title mb-4">Comparek : Ne Choisissez Plus à l’Aveugle.</h1>

                    <p class="hero-description mb-4">
                        Fini les doutes, les arnaques et les mauvaises surprises. Comparek vous aide à comparer les meilleures
                        offres d’opérateurs, banques, écoles et services au Sénégal, en toute transparence. Comparez, choisissez,
                        gagnez.
                    </p>

                    <div class="cta-wrapper">
                        <a href="#" class="btn btn-primary"><span class="iconify" data-icon="mdi-account"></span>+221 78 786 56
                            03</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="{{ asset('frontv1/img/illustration/illust5.svg') }}" alt="Business Growth" class="img-fluid" loading="lazy">
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
                            <a href="#" class="service-link">
                                <span>Comparez web & mobile</span>
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
                            <a href="#" class="service-link">
                                <span>Comparez les banques</span>
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
                            <a href="#" class="service-link">
                                <span>Comparez les écoles</span>
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
    <section id="services" class="services section" style="background: #461082">
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

    <!-- Services Section -->
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Articles</h2>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center g-5">
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <div class="service-content">
                            <h3>Custom Web Development</h3>
                            <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla quis lorem ut libero malesuada
                                feugiat. Curabitur non nulla sit amet nisl tempus convallis. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit.</p>
                            <a href="#" class="service-link">
                                <span>Learn More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="100">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-phone-fill"></i>
                        </div>
                        <div class="service-content">
                            <h3>Mobile App Solutions</h3>
                            <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia
                                eget consectetur sed. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum
                                congue leo eget malesuada.</p>
                            <a href="#" class="service-link">
                                <span>Learn More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-palette2"></i>
                        </div>
                        <div class="service-content">
                            <h3>UI/UX Design</h3>
                            <p>Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus suscipit tortor eget
                                felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>
                            <a href="#" class="service-link">
                                <span>Learn More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-bar-chart-line"></i>
                        </div>
                        <div class="service-content">
                            <h3>Digital Marketing</h3>
                            <p>Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit.</p>
                            <a href="#" class="service-link">
                                <span>Learn More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-cloud-check"></i>
                        </div>
                        <div class="service-content">
                            <h3>Cloud Computing</h3>
                            <p>Curabitur aliquet quam id dui posuere blandit. Sed porttitor lectus nibh. Vivamus magna justo,
                                lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat.</p>
                            <a href="#" class="service-link">
                                <span>Learn More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <div class="service-content">
                            <h3>Cybersecurity Solutions</h3>
                            <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec sollicitudin molestie
                                malesuada. Curabitur arcu erat, accumsan id imperdiet et. Proin eget tortor risus.</p>
                            <a href="#" class="service-link">
                                <span>Learn More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->
            </div>
        </div>
    </section>
    <!-- /Services Section -->


    <!-- Contact Section -->
    <section class="contact section" id="pre-footer">

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
                    <i class="bi bi-clock"></i>
                </div>
                    <h3>Réseaux sociaux</h3>
                    <div class="pre-footer">
                        <a href="https://linkedin.com" class="btn" target="_blank"><span class="bi bi-linkedin"></span></a>
                        <a href="https://tiktok.com" class="btn" target="_blank"><span class="bi bi-tiktok"></span></a>
                        <a href="https://instagram.com" class="btn" target="_blank"><span class="bi bi-instagram"></span></a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section><!-- /Contact Section -->
@endsection
