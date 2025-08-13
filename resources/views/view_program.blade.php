@extends('layouts.frontv1')

@section('title', $program->name)
<!-- @section('meta_description', $program->meta_description)
@section('meta_keywords', $program->seo_keywords) -->

@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center text-center school-bilboard">
                    <div class="col-md-8">
                        <h1>{{ $program->name }}</h1>
                        <small><a href="{{ route('view_school', $program->school) }}"> <span class="bi bi-building"></span> {{ $program->school->name }}</a></small>
                        <div class="program-details">
                            @if ($program->tuition_fee > 0)
                            <p><span class="bi bi-currency-exchange"></span> {{ __('schools.registration_fee') }}: {{ number_format($program->registration_fee, 0, '', ' ') . ' ' . $program->tuition_currency }}</p>
                            @endif
                            @if ($program->registration_fee > 0)
                                <p><span class="bi bi-currency-exchange"></span> {{ __('schools.tuition_fee') }}: {{ number_format($program->tuition_fee, 0, '', ' ') . ' ' . $program->tuition_currency }}</p>
                            @endif
                        </div>
                        @if ($domains->isNotEmpty())
                        <div class="program-domains">
                            <h3>{{ __('schools.domains') }}:</h3>
                            <ul>
                                @foreach ($domains as $domain)
                                    <li><span class="bi bi-bounding-box"></span> {{ $domain }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if ($accreditations->isNotEmpty())
                        <div class="program-accred">
                            <h3>{{ __('schools.accreditations') }}:</h3>
                            <ul>
                                @foreach ($accreditations as $accreditation)
                                    <li><span class="bi bi-award-fill"></span> {{ $accreditation }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-4 page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust23.png') }}" alt="comparek"
                             class="img-fluid">
                    </div>
                    <div class="mb-3 p-3 col-sm-12 col-md-12 program-description">
                        <p>{!! $program->description !!}</p>
                    </div>
                </div>
                <div class="similar-programs">
                    <h3>{{ __('schools.similar_programs') }}:</h3>
                    <div class="row similar-programs my-4">
                        @foreach ($similarPrograms as $similarProgram)
                            <div class="col-sm-6 col-md-3">
                                <div class="similar">
                                    <p class="program-name">
                                        <a href="{{ route('view_program', $similarProgram) }}">
                                            <span class="bi bi-mortarboard"></span> &nbsp; &nbsp; {{ $similarProgram->name }}
                                        </a>
                                    </p>
                                    <p class="program-school">{{$similarProgram->school->name}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="p-0">
    </section>

    @push('scripts')
        <script>
        </script>
    @endpush

@endsection
