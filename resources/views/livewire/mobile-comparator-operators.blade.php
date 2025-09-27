<div>
    <section id="list-operators" class="py-0">
        <div class="container">
            <div class="row">
                <div id="spinner" wire:loading class="justify-content-center"><span class="loader"></span></div>
                <div class="col-sm-12 col-md-4 outter-filter-wrapper">
                    <div class="form-wrapper filter-form-wrapper">
                        <h1 class="d-flex justify-content-between">
                            <span class="bi bi-sliders">&nbsp;{{ __('offers.filter') }}</span>
                            <span class="d-md-none d-sm-inline-block bi bi-chevron-double-down  toggle-filter filter-button"></span>
                        </h1>
                        <div id="filter-wrapper" class="php-email-form {{$filterIsVisible ? '' : 'hide-form'}}">
                            <div class="row">
                                {{-- OPERATOR --}}
                                <div class="col-md-12 mt-1 form-group">
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
                                {{-- VALIDITY LENGTH --}}
                                <div class="col-md-12 mt-4 form-group">
                                    <h3><span class="bi bi-filter"></span> {{__('offers-features.validity_length')}}</h3>
                                    <div class="custom-checkbox-group">
                                        @foreach($this->validityOptions as $k => $days)
                                            <label class="custom-checkbox">
                                                <input type="radio" name="validityLength" wire:model.live="validityLength" value="{{ $days }}">
                                                <span>{{ $days . ' ' . trans_choice('offers-features.day', $days) }} {{ $days == 30 ? '+' : '' }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- PRICE (CFA) --}}
                                <div class="col-md-12 mt-2 form-group mb-3" wire:ignore>
                                    <label class="noUI-label">
                                        <span>{{ __('commons.price') }}</span>
                                    </label>
                                    <div id="priceSlider"
                                        data-event="priceRangeChanged"
                                        data-min="0" data-max="5000" data-step="100"
                                        data-start="{{ json_encode($priceRange ?? [0,5000]) }}"
                                        wire:on:priceRangeChanged="setPriceRange($event.detail)"
                                        >
                                    </div>
                                </div>
                                {{-- DATA (Mo/Go) --}}
                                <div class="col-md-12 mt-2 form-group mb-3" wire:ignore>
                                    <label class="noUI-label">
                                        <span class="bi bi-filter">{{ __('offers-features.data') }}</span>
                                    </label>
                                    <div id="dataSlider"
                                        data-event="dataRangeChanged"
                                        data-min="0" data-max="102400" data-step="10"     {{-- value unit = Mo --}}
                                        data-start="{{ json_encode($dataRange) }}"
                                        data-format="data">
                                    </div>
                                </div>
                                {{-- MINUTES --}}
                                <div class="col-md-12 mt-2 form-group mb-3" wire:ignore>
                                    <label class="noUI-label"">
                                        <span class="bi bi-filter">{{ __('offers-features.call_minutes') }}</span>
                                    </label>
                                    <div id="minutesSlider"
                                        data-event="minutesRangeChanged"
                                        data-min="0" data-max="1000" data-step="10"
                                        data-start="{{ json_encode($minutesRange) }}"
                                        data-format="minutes"></div>
                                </div>
                                {{-- SMS --}}
                                <div class="col-md-12 mt-2 form-group" wire:ignore>
                                    <label class="noUI-label">
                                        <span class="bi bi-filter">{{ __('offers-features.nbr_sms') }}</span>
                                    </label>
                                    <div id="smsSlider"
                                        data-event="smsRangeChanged"
                                        data-min="0" data-max="1000" data-step="10"
                                        data-start="{{ json_encode($smsRange) }}"
                                        data-format="sms"></div>
                                </div>
                                <div class="col-md-12 mt-5 form-group ">
                                    <div class="custom-checkbox-group">
                                        <h3 class="m-0"><span class="bi bi-filter"></span> Comparek Score</h3>
                                        @foreach($scores as $score)
                                            <label for="{{ "score_{$score->value}" }}" class="custom-checkbox">
                                                <input id="{{ "score_{$score->value}" }}" type="radio" name="score" value="{{ $score->value }}" wire:model.live="score">
                                                <span>{{ $score->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 form-group sorting mb-1 mt-5">
                                    <div class="custom-checkbox-group">
                                        <h3 class="m-0"><span class="bi bi-filter"></span> {{ __('commons.sort') }}</h3>
                                        <label for="sort_price" class="custom-checkbox">
                                            <input id="sort_price" type="radio" name="sortBy" value="price" wire:model.live="sortBy">
                                            <span>{{ __('commons.price') }}</span>
                                        </label>
                                        <!-- <label for="sort_data" class="custom-checkbox">
                                            <input id="sort_data" type="radio" name="sortBy" value="data_volume_value" wire:model.live="sortBy">
                                            <span>{{ __('offers-features.data') }}</span>
                                        </label>
                                        <label for="sort_minutes" class="custom-checkbox">
                                            <input id="sort_minutes" type="radio" name="sortBy" value="voice_minutes" wire:model.live="sortBy">
                                            <span>{{ __('offers-features.call_minutes') }}</span>
                                        </label>
                                        <label for="sms_nbr" class="custom-checkbox">
                                            <input id="sms_nbr" type="radio" name="sortBy" value="sms_nbr" wire:model.live="sortBy">
                                            <span>{{ __('offers-features.nbr_sms') }}</span>
                                        </label>
                                        <label for="sort_credit" class="custom-checkbox">
                                            <input id="sort_credit" type="radio" name="sortBy" value="phone_credit" wire:model.live="sortBy">
                                            <span>{{ __('offers-features.phone_credit') }}</span>
                                        </label> -->
                                        <label for="sort_note" class="custom-checkbox">
                                            <input id="sort_note" type="radio" name="sortBy" value="sort_note" wire:model.live="sortBy">
                                            <span>{{ __('commons.notes') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group reset-filter-wrapper d-flex justify-content-center align-content-center">
                                    <button type="button" wire:click="resetFilter" class="reset-filter">{{ __('commons.reset-filter') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    @foreach($telecomOffers as $feature)
                        <x-mobile-offer-row :feature="$feature">
                            <div class="mb-4">
                                {!! $feature->offer->detailed_description !!}
                            </div>
                            <ul>
                                <li>
                                    <strong>{{__('offers.subscription_fee')}}</strong> {!! number_format($feature->offer->activation_fee, 0, '', ' ') . '<sup>FCFA</sup>' !!}
                                </li>
                                <li>
                                    <strong>{{ __('offers.commitment') }}</strong>
                                    {{ $feature->offer->has_commitment ? __('offers.with_commitment') : __('offers.without_commitment')}}
                                </li>
                            </ul>
                        </x-mobile-offer-row>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
