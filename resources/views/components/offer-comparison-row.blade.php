@props(['offer', 'serviceType' => 'internet'])

@if ($serviceType == 'internet')
<div {{ $attributes->merge(['class' => 'col-lg-12 col-md-12 row my-3 mx-0 offer-comparison-row']) }}>
    <div class="col-md-12 col-sm-12 m-0 p-0 logo-n-name-wrapper">
        <h2 class="offer-name">{{ $offer->name }}</h2>
    </div>
    <div class="col-md-12 col-sm-12 m-0 p-0 row offer-details-wrapper py-sm-2">
        <div class="offer-name-column col-sm-12 col-md-6 py-sm-3">
            <div class="metas">
                <ul>
                    <li>
                        <span class="bi bi-speedometer"></span>
                        {{ $offer->debit }} <span style="text-transform:capitalize">{{ $offer->debit_unit }}</span>
                    </li>
                    <li>
                        <span class="bi bi-wifi"></span> {{ $offer->technology?->label() ?? '' }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 py-sm-3 d-flex align-items-center justify-content-center">
            <div class="offer-price">
                @if ((int) $offer->price_per_month > 0)
                    <div class="price d-flex align-items-center justify-content-end">
                        {!! number_format($offer->price_per_month, 0, '', ' ') . '<sup> FCFA</sup>' !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-2 d-flex align-items-center justify-content-center">
            <div class="offer-score">
                <x-comparek-score-badge :grade="$offer->currentScoreGrade()" size="small"/>
            </div>
        </div>
    </div>
    <a class="show-more"
       data-bs-toggle="collapse"
       href="#{{ $offer->id }}_collapse"
       role="button"
       aria-expanded="false"
       aria-controls="{{ $offer->id }}_collapse">
        {{ __('commons.more_details') }}
    </a>
    <div class="collapse" id="{{ $offer->id }}_collapse">
        <div class="card card-body">
            {{ $slot }}
        </div>
    </div>
</div>
@elseif ($serviceType == 'mobile')
<div>
    // Mobile offer row component (not implemented yet)
</div>
@endif
