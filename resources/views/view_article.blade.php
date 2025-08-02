@extends('layouts.frontv1')

@section('title', $post->meta_title . ' - ' . config('app.name'))
@section('meta_description', $post->meta_description ?? '')
@section('meta_keywords', $post->meta_keywords ?? '')
@section('content')
<main class="main posts">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading posts">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
                <p class="post-category">
                    <a href="{{ route('articles', $post->category->slug) }}">
                        <span class="section-subtitle">{{ $post->category->name }}</span>
                    </a>
                </p>
                <h1 class="heading-title">{{ $post->name }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          <div class="col-lg-12">
            <div class="service-main-image" data-aos="zoom-in" data-aos-delay="200">
                <!-- {!! $post->excerpt !!}
              <img src="{{ $post->imageUrl() }}" alt="" class="img-fluid rounded-4" width="10%"> -->
              <!-- <div class="experience-badge">
                <p>{ { $post->category->name }}</p>
              </div> -->
            </div>
          </div>

          <div class="col-lg-12 m-0">
            <div class="service-main-content">
              <div class="section-header" data-aos="fade-up">
                <!-- <span class="section-subtitle">{{ $post->category->name }}</span> -->
              </div>
              {!! $post->content !!}
            </div>
          </div>
        </div>

        <div class="service-cta mt-5 text-center" data-aos="zoom-in">
          <h3>Ready to grow your business online?</h3>
          <p>Contact our team today for a free consultation and custom proposal.</p>
          <a href="#" class="btn-service">Get Started <i class="bi bi-arrow-right"></i></a>
        </div>

      </div>

    </section><!-- /Service Details Section -->

  </main>
@endsection