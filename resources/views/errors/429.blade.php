@extends('layouts.error')

@section('title', 'Page non trouvée - 429')

@section('content')
    <section
        id="hero" 
        class="hero section"
        >

        <div class="container error-bilboard" data-aos="fade-up" data-aos-delay="100"
        style="background-image: url('{{ asset('assets/429.png') }}');">
            <div class="row align-items-center mb-5">
                <div class="col-lg-12 text-center text-lg-start">
                    <div 
                        class="error-content"
                        data-aos="zoom-out"
                        data-aos-delay="200">
                        <h1 class="error-code">Oups! Trop de requêtes.</h1>
                        <p class="error-description">Vous avez dépassé le nombre de requêtes autorisées. Veuillez réessayer plus tard.</p>
                        <div class="cta-wrapper d-flex justify-content-center">
                            <a  href="{{ route('home') }}" class="btn btn-primary"><span class="bi bi-bullseye"></span> Retour à l'accueil</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection