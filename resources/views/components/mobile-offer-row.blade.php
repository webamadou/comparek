<div {{ $attributes->merge(['class' => 'col-lg-12 col-md-12 row my-3 mobile-offer-row']) }}>
    <div class="col-sm-1 col-md-2 col-lg-2 m-0 p-0 logo-n-name-wrapper">
        <div class="offer-column offer-operator text-center">
            {{ $feature->offer->operator->name }} <br>
            <img src="{{ Storage::disk('public')->url($feature->offer->operator->images->thumb_path) }}"
                 alt="{{ $feature->offer->operator->name }}"
                 width="55" height="55">
        </div>
    </div>
    <div class="col-sm-7 col-md-6 col-lg-6 m-0 pt-4 row mobile-offer-details-wrapper">
        <div class="offer-details col-12">
            <ul>
                @if(!empty($feature->data_volume_value))
                <li>
                    <span class="bi bi-database-fill"></span> {!! "{$feature->data_volume_value} <sup>{$feature->data_volume_unit}</sup>" !!}
                </li>
                @endif
                @if(!empty($feature->voice_minutes))
                <li>
                    <span class="bi bi-stopwatch-fill"></span> {!! number_format($feature->voice_minutes, 0, '', ' ') . ' ' .__('offers-features.call_minutes')  !!}
                </li>
                @endif
                @if(!empty($feature->sms_nbr))
                <li>
                    <span class="bi bi-chat-left-text-fill"></span> {!! number_format($feature->sms_nbr, 0, '', ' ') . ' ' . __('offers-features.nbr_sms') !!}
                </li>
                @endif
                @if(!empty($feature->phone_credit))
                <li>
                    <span class="bi bi-phone-fill"></span> {!! number_format($feature->phone_credit, 0, '', ' ') . ' ' . __('offers-features.phone_credit') !!}
                </li>
                @endif
                @if(!empty($feature->validity_length))
                <li>
                    <span class="bi bi-chat-left-text-fill"></span> {!! $feature->validity_length . ' ' . trans_choice('offers-features.day', $feature->validity_length) !!}
                </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 mobile-offer-price-badge">
        <div class="mobile-offer-price">
            @if ((int) $feature->price > 0)
                <div class="price">
                    {!! number_format($feature->price, 0, '', ' ') . '<sup> FCFA</sup>' !!}
                </div>
            @endif
        </div>
        <div class="mobile-offer-badge">
            <div class="offer-score">
                <x-comparek-score-badge :grade="$feature->offer->currentScoreGrade()" size="small"/>
            </div>
        </div>
    </div>
    <div class="col-12">
        <p class="feature-offer-name">{!! '<small> ' . $feature->offer?->name . '</small>' !!}</p>
    </div>
</div>
