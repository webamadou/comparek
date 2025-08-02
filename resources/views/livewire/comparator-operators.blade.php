<div>
    <section id="list-operators py-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-wrapper filter-form-wrapper">
                        <h1><span class="bi bi-sliders"> </span>{{ __('offers.filter') }}</h1>
                        <div id="filter-wrapper" class="php-email-form">
                            <div class="row">
                                <div class="col-md-12 my-4 form-group">
                                    <h3><span class="bi bi-filter"></span> {{__('offers.operators')}}</h3>
                                    <div class="custom-checkbox-group">
                                        @foreach($operators as $op)
                                            <label class="custom-checkbox">
                                                <input type="radio" name="operator" wire:model.live="operator"
                                                       value="{{ $op->id }}">
                                                <span>{{ $op->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 my-2 form-group">
                                    <div class="custom-checkbox-group">
                                        <h3><span class="bi bi-filter"></span> {{ __('offers.service_types') }}</h3>
                                        @foreach($serviceTypes as $st)
                                            <label class="custom-checkbox" for="{{ "service_{$st->id}" }}">
                                                <input type="radio" name="serviceTypes"
                                                       id="{{ "service_{$st->id}" }}" value="{{ $st->id }}"
                                                       wire:model.live="serviceType">
                                                <span>{{ $st->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 my-2 form-group">
                                    <div class="custom-checkbox-group">
                                        <h3><span class="bi bi-filter"></span> Comparek Score</h3>
                                        @foreach($scores as $score)
                                            <label for="{{ "score_{$score->value}" }}" class="custom-checkbox">
                                                <input id="{{ "score_{$score->value}" }}" type="checkbox" name="score"
                                                       value="{{ $score->value }}" wire:model.live="score">
                                                <span>{{ $score->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 my-2 form-group">
                                    <div class="input-group">
                                        <label class="d-flex slider-label">
                                            <span> {{ __('commons.price') }} :</span>
                                            <span class="">
                                                {{ $pricePerMonthMin >= 100000 ? '100 000 CFA et +' : number_format($pricePerMonthMin, 0, '', ' ') . 'CFA' }}
                                            </span>
                                        </label>
                                        <input type="range"
                                               min="100"
                                               max="100000"
                                               step="100"
                                               wire:model.live.200ms="pricePerMonthMin"
                                               class="form-range w-100"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12 my-2 form-group">
                                    <div class="custom-checkbox-group">
                                        <h3><span class="bi bi-filter"></span> {{ __('offers.technologies') }}</h3>
                                        @foreach(\App\Enums\TechnologyEnum::cases() as $techno)
                                            <label for="{{ $techno->value }}" class="custom-checkbox">
                                                <input id="{{ $techno->value }}" type="checkbox" name="technology"
                                                       value="{{ $techno->value }}" wire:model.live="technology">
                                                <span>{{ $techno->label() }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 my-2 form-group sorting">
                                    <div class="custom-checkbox-group">
                                        <h3><span class="bi bi-filter"></span> {{ __('commons.sort') }}</h3>
                                        <label for="sort_price" class="custom-checkbox">
                                            <input id="sort_price" type="radio" name="sortBy" value="price_per_month"
                                                   wire:model.live="sortBy">
                                            <span>{{ __('offers.monthly_price') }}</span>
                                        </label>
                                        <label for="sort_note" class="custom-checkbox">
                                            <input id="sort_note" type="radio" name="sortBy" value="sort_note"
                                                   wire:model.live="sortBy">
                                            <span>{{ __('commons.notes') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div
                                    class="col-md-12 form-group reset-filter-wrapper d-flex justify-content-center align-content-center">
                                    <button type="button" wire:click="resetFilter"
                                            class="reset-filter">{{ __('commons.reset-filter') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    @foreach($telecomOffers as $offer)
                        <x-offer-row :offer="$offer">
                            <div class="mb-4">
                                {!! $offer->detailed_description !!}
                            </div>
                            <ul>
                                <li>
                                    <strong>{{__('offers.subscription_fee')}}</strong> {!! number_format($offer->activation_fee, 0, '', ' ') . '<sup>FCFA</sup>' !!}
                                </li>
                                <li>
                                    <strong>{{ __('offers.commitment') }}</strong>
                                    {{ $offer->has_commitment ? __('offers.with_commitment') : __('offers.without_commitment')}}
                                </li>
                            </ul>
                        </x-offer-row>
                    @endforeach
                </div>

            </div>
        </div>
        {{--<div>{ { $ telecomOffers->links() }}</div>--}}
    </section>
</div>
