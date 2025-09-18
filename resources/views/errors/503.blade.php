@extends('layouts.error')

@section('title', 'Erreur serveur - 503')

@section('content')
    <section
        id="hero" 
        class="hero section"
        >

        <div class="container error-bilboard" data-aos="fade-up" data-aos-delay="100"
        style="background-image: url('{{ asset('assets/server-error.png') }}');">
            <div class="row align-items-center mb-5">
                <div class="col-12 text-center text-lg-start">
                    <h1 class="error-code-value">503</h1>
                </div>
                <div class="col-lg-12 text-center text-lg-start">
                    <div 
                        class="error-content-text"
                        data-aos="zoom-out"
                        data-aos-delay="200">
                        <h2 class="error-code">
                            Oups! Erreur du serveur.
                        </h2>
                        <p class="error-description">
                            Le serveur rencontre des difficultés. Veuillez réessayer plus tard.
                        </p>
                        <div class="cta-wrapper d-flex justify-content-center">
                            <a  href="{{ route('home') }}" class="btn btn-primary"><span class="bi bi-bullseye"></span> Retour à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection