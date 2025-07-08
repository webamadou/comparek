<div {{ $attributes->merge(['class' => 'col-lg-12 col-md-12 row my-3 offer-row']) }}>
    <div class="col-md-12 col-sm-12 col-lg-6 m-0 p-0 logo-n-name-wrapper">
        <div class="offer-column offer-operator text-center">
            {{ $offer->operator->name }} <br>
            <img src="{{ Storage::disk('public')->url($offer->operator->images->thumb_path) }}"
                 alt="{{ $offer->operator->name }}"
                 width="55" height="55">
        </div>
        <h2 class="offer-name">{{ $offer->name }}</h2>
    </div>
    <div class="col-md-12 col-sm-12 col-lg-6 m-0 p-0 pt-4 row offer-details-wrapper">
        <div class="offer-name-column col-6">
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
        <div class="col-6">
            <div class="offer-price">
                @if ((int) $offer->price_per_month > 0)
                    <div class="price">
                        {!! number_format($offer->price_per_month, 0, '', ' ') . '<sup> FCFA</sup>' !!}
                    </div>
                @endif
                <div class="offer-score">
                    <x-comparek-score-badge :grade="$offer->currentScoreGrade()" size="small"/>
                </div>
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
