@extends('layouts.frontv1')

@section('content')
    <div class="page-title">
        <div class="heading" style="padding: 0;">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>
                            Liste des fournisseurs internet et des opérateurs mobiles au Sénégal en 2025
                            <img src="{{ asset('frontv1/img/illustration/illust10.svg') }}" alt="comparek" style="width: 230px;">
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="pricing" class="pricing section light-background mt-0">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4 justify-content-center">
                @foreach($operators as $key => $operator)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-card">
                            <h1 class="text-center" style="background: #f0f0f0; font-weight: bold; border-bottom: 1px solid #ff5600;">{{ $operator->name }}</h1>
                                    <p class="d-flex justify-center mt-5"
                                       style="margin: 2rem auto;
                                        width: 200px;
                                        height: 200px;
                                        background: url({{ Storage::disk('public')->url($operator->images->path) }});
                                        background-position: center;
                                        background-size: cover;
                                        ">
                            </p>
                            <a href="{{ route('operator_page', $operator) }}" class="btn btn-primary">
                                En savoir plus
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div style="width: 76vw; height: 280px; border: 1px solid #dcdcdc; margin: 0 auto; line-height: 1.4">
            <h1 class="text-center" style="color: #cdcdcd">pub</h1>
        </div>
    </section>
    <section id="services-alt" class="services-alt section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-md-5 offset-md-4 col-sm-12 call-advizer"">
                    <div class="services-list">
                        <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                            <div class="service-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            <div class="service-content">
                                <h4><a href="service-details.html">Un conseiller à votre service</a></h4>
                                <p>
                                    Du lundi au vendredi de 08h à 17h.<br>
                                    Le samedi de 9h à 16h
                                </p>
                                <p><a href="#" class="btn">Rappel gratuit</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
