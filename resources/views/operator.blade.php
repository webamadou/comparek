@extends('layouts.frontv1')
<x-seo-meta :page="$page ?? []" />
@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title d-flex justify-content-center">{{ $operator->name }}</h1>
                        <ul class="opertors-details">
                            <li><span class="bi bi-pin"></span>{{ $operator->headquarters_location }}</li>
                            @if (! empty($operator->website_url))
                                <li><a href="{{ $operator->website_url }}">{{ $operator->name }}</a></li>
                            @endif
                            <li>{{ $operator->established_year }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-between gy-4">
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
