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
    <div {{ $attributes->merge(['class' => 'col-lg-12 col-md-12 row my-3 mx-0 offer-comparison-row']) }}>
        <div class="col-md-12 col-sm-12 m-0 p-0 logo-n-name-wrapper">
            <h2 class="offer-name">{{ $offer->name }}</h2>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 m-0 pt-4 row mobile-offer-details-wrapper">
            <div class="offer-details col-12">
                <ul>
                    @if(!empty($offer->data_volume_value))
                    <li class="data-volume my-1">
                        <span class="bi bi-database-fill"></span> {!! "{$offer->data_volume_value} <sup>{$offer->data_volume_unit}</sup>" !!}
                    </li>
                    @endif
                    @if(!empty($offer->voice_minutes))
                    <li class="voice-minutes my-1">
                        <span class="bi bi-stopwatch-fill"></span> {!! number_format($offer->voice_minutes, 0, '', ' ') . ' ' .__('offers-features.call_minutes')  !!}
                    </li>
                    @endif
                    @if(!empty($offer->sms_nbr))
                    <li class="sms-nbr my-1">
                        <span class="bi bi-chat-left-text-fill"></span> {!! number_format($offer->sms_nbr, 0, '', ' ') . ' ' . __('offers-features.sms') !!}
                    </li>
                    @endif
                    @if(!empty($offer->phone_credit))
                    <li class="phone-credit my-1">
                        <span class="bi bi-phone-fill"></span> {!! number_format($offer->phone_credit, 0, '', ' ') . ' ' . __('offers-features.phone_credit') !!}
                    </li>
                    @endif
                    @if(!empty($offer->validity_length))
                    <li class="validity-length my-1">
                        <span class="bi bi-calendar-range"></span> {!! $offer->validity_length . ' ' . trans_choice('offers-features.day', $offer->validity_length) !!}
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 mobile-offer-price-badge">
            <div class="mobile-offer-price">
                @if ((int) $offer->price > 0)
                    <div class="price">
                        {!! number_format($offer->price, 0, '', ' ') . '<sup> FCFA</sup>' !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-2">
            <div class="mobile-offer-badge">
                <div class="offer-score">
                    <x-comparek-score-badge :grade="$offer->offer->currentScoreGrade()" size="small"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
