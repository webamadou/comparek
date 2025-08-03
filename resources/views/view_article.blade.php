@extends('layouts.frontv1')

@section('title', $post->meta_title . ' - ' . config('app.name'))
@section('meta_description', $post->meta_description ?? '')
@section('meta_keywords', $post->meta_keywords ?? '')
@section('content')
<main class="main posts">

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
    </div>

    <section id="service-details" class="service-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">
          <div class="col-lg-12">
            <div class="service-main-image" data-aos="zoom-in" data-aos-delay="200">
            </div>
          </div>
          <div class="col-lg-12 m-0">
            <div class="service-main-content">
              <div class="section-header" data-aos="fade-up">
              </div>
              {!! $post->content !!}
            </div>
          </div>
        </div>

        <div class="service-cta mt-5 text-center" data-aos="zoom-in">
          <h3>{{ __('posts.similar_posts') }}</h3>
          <div class="row">
            @forelse($similarPosts as $post)
              <div class="col-sm-12 col-md-4">
                <x-post-brick :post="$post" />
              </div>
            @empty
            <div class="col-12">
                <p class="text-muted">{{ __('posts.no_similar_posts') }}</p>
            </div>
            @endforelse
          </div>
        </div>

      </div>

    </section>

  </main>
@endsection