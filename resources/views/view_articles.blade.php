@extends('layouts.frontv1')

@section('title', $title . ' - ' . config('app.name'))
@section('meta_description', $meta_description ?? '')
@section('meta_keywords', $meta_keywords ?? '')
@section('content')

<main class="main posts">
  <div class="page-title">
      <div class="heading posts">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="heading-title">{{ $title }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  <sction class="section" id="articles">
      <div class="container mb-5 mt-0" data-aos="fade-up" data-aos-delay="100">
        @foreach($posts as $post)
          <div class="row gy-5 mt-0 mb-5">
            <div class="col-lg-6">
              <div class="service-main-image" data-aos="zoom-in" data-aos-delay="200">
                <a href="{{ route('view_article', $post) }}">
                  <img src="{{ $post->imageUrl() }}" alt="{{ $post->name }}" class="img-fluid rounded-4">
                </a>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="service-main-content">
                <div class="section-header my-4" data-aos="fade-up">
                <span class="section-subtitle">
                    <a href="{{ route('articles', $post->category->slug) }}">
                        {{ $post->category->name }}
                    </a>
                </span>
                  <h2>
                    <a href="{{ route('view_article', $post) }}">{{ $post->name }}</a>
                  </h2>
                </div>
                {!! $post->excerpt !!}
                <a href="{{ route('view_article', $post) }}">{{ __('posts.read_more')}} <span class="bi bi-chevron-double-right"></span></a>
              </div>
            </div>

          </div>
        @endforeach
      </div>
  </section>
</main>
@endsection