@extends('layouts.error')

@section('title', 'Page non trouvée - 419')

@section('content')
    <section
        id="hero" 
        class="hero section"
        >

        <div class="container error-bilboard" data-aos="fade-up" data-aos-delay="100"
        style="background-image: url('{{ asset('assets/419.png') }}');">
            <div class="row align-items-center mb-5">
                <div class="col-lg-12 text-center text-lg-start">
                    <div 
                        class="error-content"
                        data-aos="zoom-out"
                        data-aos-delay="200">
                        <h1 class="error-code">
                            Oups! Page expirée.
                        </h1>
                        <p class="error-description">Votre session a expiré. Veuillez vous reconnecter.</p>
                        <div class="cta-wrapper d-flex justify-content-center">
                            <a  href="{{ route('home') }}" class="btn btn-primary"><span class="bi bi-bullseye"></span> Retour à l'accueil</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection