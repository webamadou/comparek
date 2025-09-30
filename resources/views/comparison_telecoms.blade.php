@extends('layouts.frontv1')
<x-seo-meta :page="$page ?? []" />
@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center telecom-bilboard">
                    <div class="col-md-8">
                        <h1 class="text-center">{{ __('offers.comparison_telecoms') }}</h1>
                    </div>
                    <div class="col-sm-6 col-md-4 page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust34.svg') }}" alt="comparek" class="img-fluid">
                    </div>
                    <div class="col-12 text-left px-3 page-description">
                        {!! $page['body'] ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="p-0">
        <div class="container">
            <div class="row justify-content-between gy-4">
                <div id="schoolComparison" class="px-1">
                    @livewire('telecom-comparison')
                </div>
                <div style="height: 300px">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-12">
                    {!! $page['page_footer'] ?? '' !!}
                </div>
            </div>
        </div>
    </section>
@endsection
