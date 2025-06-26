@extends('layouts.dashboard')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="card-title mb-3">{{ $telecomOffer->name }}</h4>
                    <div class="small text-body-secondary">
                        {!! $telecomOffer->short_description !!} <br>
                        <strong>Operateur: </strong>{!! $telecomOffer->operator?->name !!}<br>
                        <strong>Type de service: </strong>{!! $telecomOffer->serviceType?->name !!}
                    </div>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <div class="btn-group btn-group-toggle mx-3" data-coreui-toggle="buttons">
                        <a href="{{ route('telecom_offer.edit', $telecomOffer) }}" class="btn btn-outline-success">
                            <span class="iconify" data-icon="mdi-clipboard-edit-outline"></span> Editer l'offre
                        </a>
                        <a href="{{ route('offer_scores.edit', $telecomOffer) }}" class="btn btn-outline-primary">
                            <span class="iconify" data-icon="mdi-numeric-8-box-multiple-outline"></span> Editer les scores
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
            <div class="col px-3">{!! $telecomOffer->detailed_description !!}</div>
        </div>
        <div class="card-footer">
            <h4>Comparek scores</h4>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-5 g-4 mb-2 text-center">
                @forelse($telecomOffer->scoreValues as $score)
                    <div class="col">
                        <div class="text-body-secondary">{{ $score->criteria?->name }}</div>
                        <div class="fw-semibold text-truncate">{{ $score->value }}</div>
                        <div class="progress progress-thin mt-2">
                            <div
                                class="progress-bar bg-primary"
                                role="progressbar"
                                style="width: {{$score->value .'0%'}}"
                                aria-valuenow="{{ $score->value }}"
                                aria-valuemin="0"
                                aria-valuemax="10"></div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p>
                            Les scores ne sont pas encore enregistrés pour cette offre
                            <a class="btn btn-primary" href="">
                                <span class="iconify" data-icon="mdi-numeric-8-box-multiple-outline"></span> &nbsp;
                                {{ __('Noter cet offre') }}
                            </a>
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
