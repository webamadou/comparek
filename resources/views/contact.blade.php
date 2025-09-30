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
                <div class="col-sm-12 col-md-4 page-bilboard-img">
                    <img src="{{ asset('frontv1/img/illustration/illust33.svg') }}" alt="comparek" class="img-fluid">
                </div>
                <div class="col-sm-12 col-lg-8" data-aos="fade-up">
                    <div class="portfolio-description">
                        <p class="mb-0">
                            {!! $page['body'] !!}
                        </p>
                    </div>

                    <ul class="social-medias-links d-flex justify-content-center list-unstyled">
                        <li><a href="https://www.linkedin.com/company/comparek/" target="_blank" rel="noopener" class="linkedin"><i class="bi bi-linkedin"></i></a></li>
                        <li><a href="https://tiktok.com/comparek" target="_blank" rel="noopener" class="twitter"><i class="bi bi-tiktok"></i></a></li>
                        <li><a href="https://www.instagram.com/comparek_sn/" target="_blank" rel="noopener" class="instagram"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-12">
                </div>
            </div>
        </div>
    </section>
@endsection
