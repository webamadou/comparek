@extends('layouts.frontv1')

@section('content')
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Liste des fournisseurs internet et des opérateurs mobiles au Sénégal en 2025</h1>
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
                            <h3>{{ $operator->name }}</h3>
                            <p>{!! $operator->description !!}</p>
                            <img
                                src="{{ Storage::disk('public')->url($operator->images->path) }}"
                                class="card-img">
                            <a href="{{ '#' }}" class="btn btn-primary">
                                Plus d'info
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
