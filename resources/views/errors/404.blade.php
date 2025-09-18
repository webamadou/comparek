@extends('layouts.error')

@section('title', 'Page non trouvée - 404')

@section('content')
    <section
        id="hero" 
        class="hero section"
        >

        <div class="container error-bilboard" data-aos="fade-up" data-aos-delay="100"
        style="background-image: url('{{ asset('assets/404.png') }}');">
            <div class="row align-items-center mb-5">
                <div class="col-lg-12 text-center text-lg-start">
                    <div 
                        class="error-content"
                        data-aos="zoom-out"
                        data-aos-delay="200">
                        <h1 class="error-code">Oups! La page que vous recherchez n'existe pas.</h1>
                        <p class="error-description">Il se peut que la page ait été supprimée, renommée ou qu'elle soit temporairement indisponible.</p>
                        <div class="cta-wrapper d-flex justify-content-center">
                            <a  href="{{ route('home') }}" class="btn btn-primary"><span class="bi bi-bullseye"></span> Retour à l'accueil</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection