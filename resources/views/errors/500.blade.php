@extends('layouts.error')

@section('title', 'Page non trouvée - 500')

@section('content')
    <section
        id="hero" 
        class="hero section"
        >

        <div class="container error-bilboard" data-aos="fade-up" data-aos-delay="100"
        style="background-image: url('{{ asset('assets/server-error.png') }}');">
            <div class="row align-items-center mb-5">
                <div class="col-12 text-center text-lg-start">
                    <h1 class="error-code-value">500</h1>
                </div>
                <div class="col-lg-12 text-center text-lg-start">
                    <div 
                        class="error-content-text"
                        data-aos="zoom-out"
                        data-aos-delay="200">
                        <h2 class="error-code">Oups! Une erreur interne est survenue.</h2>
                        <p class="error-description">Il se peut que le serveur soit temporairement indisponible ou qu'une erreur se soit produite.</p>
                        <div class="cta-wrapper d-flex justify-content-center">
                            <a  href="{{ route('home') }}" class="btn btn-primary"><span class="bi bi-bullseye"></span> Retour à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection