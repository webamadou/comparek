@extends('layouts.frontv1')
<x-seo-meta :page="$page ?? []" />

@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title d-flex justify-content-center">{{ $page['name'] }}</h1>
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
                            {!! $page['body'] !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
