@extends('layouts.frontv1')

@section('content')
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title">{{ $operator->name }}</h1>
                        <ul class="opertors-details">
                            <li><span class="bi bi-pin"></span>{{ $operator->headquarters_location }}</li>
                            <li>{{ $operator->website_url }}</li>
                            <li>{{ $operator->established_year }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-between gy-4 mt-4">
                <div class="col-lg-12" data-aos="fade-up">
                    <div class="portfolio-description">
                        <p class="mb-0">
                            {!! $operator->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
