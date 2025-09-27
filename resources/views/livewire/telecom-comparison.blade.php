<div class="container py-4 comparison-container">
    <h2>{{ __('offers.comare_telecoms') }}</h2>

    <div class="overflow-x-auto row comparison-wrapper row">
        <div class="custom-checkbox-group">
            <h3><span class="bi bi-filter"></span> {{ __('offers.service_types') }}</h3>
            @foreach(['internet', 'mobile'] as $st)
                <label class="custom-checkbox" for="{{ "service_{$st}" }}">
                    <input
                        type="radio"
                        name="serviceType"
                        id="{{ "service_{$st}" }}"
                        value="{{ $st }}"
                        wire:model.live="serviceType"
                        >
                    <span>{{ $st }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <!-- Select boxes to pick telecom operators -->
    <div class="row fields comparison-select position-relative">
        <div class="select-wrapper wrapperOperatorA">
            <select wire:model.live="operatorA" id="operatorA" class="form-select w-full">
                <option value="">{{ __('offers.select_telecom_1') }}</option>
                @foreach($operatorsAList as $operator)
                    <option value="{{ $operator->id }}" @if($operator->disabled) disabled @endif>
                        {{ $operator->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="andvs">VS</div>
        <div class="select-wrapper wrapperOperatorB">
            <select wire:model.live="operatorB" id="operatorB" class="form-select w-full">
                <option value="">{{ __('offers.select_telecom_2') }}</option>
                @foreach($operatorsBList as $operator)
                    <option value="{{ $operator->id }}" @if($operator->disabled) disabled @endif>
                        {{ $operator->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="overflow-x-auto row comparison-filter-wrapper row {{ ! empty($operatorDataA) || ! empty($operatorDataB) ? '' : 'd-none' }}">
        <div class="col-12 d-flex justify-content-between align-items-center my-0">
            <h5>{{ __('filters.filter') }}</h5>
            <div class="d-none"><a href="#" wire:click.prevent="resetTheFilter"> <span class="bi-arrow-clockwise"></span>{{ __('filters.reset') }}</a></div>
        </div>
        <div id="filter-wrapper" class="{{ $serviceType === 'internet' ? '' : 'd-none' }} row col-12 m-0 p-0">
            {{-- PRICE (CFA) --}}
            <div class="col-sm-12 col-md-6 mt-2 form-group mb-3" wire:ignore>
                <label class="noUI-label">
                    <span>{{ __('commons.price') }}</span>
                </label>
                <div id="internetpriceSlider"
                    data-event="internetPriceRangeChanged"
                    data-min="0" data-max="60000" data-step="100"
                    data-start="{{ json_encode($internetPriceRange ?? [0,60000]) }}"
                    wire:on:priceRangeChanged="setInternetPriceRange($event.detail)"
                    >
                </div>
            </div>
            <div class="col-md-6 my-2 form-group">
                <div class="custom-checkbox-group">
                    <h3><span class="bi bi-filter"></span> {{ __('offers.technologies') }}</h3>
                    @foreach(\App\Enums\TechnologyEnum::cases() as $techno)
                        <label for="{{ $techno->value }}" class="custom-checkbox">
                            <input id="{{ $techno->value }}" type="checkbox" name="technology[]"
                                    value="{{ $techno->value }}" wire:model.live="technology">
                            <span>{{ $techno->label() }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- the mobile filters -->
    <div class="{{ $serviceType === 'mobile' && (! empty($operatorA) || ! empty($operatorB)) ? '' : 'd-none' }} row col-12 m-0 p-0">
        <div class="form-wrapper filter-form-wrapper p-3 overflow-hidden">
            <div id="filter-wrapper" class="php-email-form row">
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
                <div class="col-sm-12 col-md-6 px-4 mt-2 form-group mb-3" wire:ignore>
                    <label class="noUI-label">
                        <span>{{ __('commons.price') }}</span>
                    </label>
                    <div id="priceSlider"
                        data-event="priceRangeChanged"
                        data-min="0" data-max="20000" data-step="100"
                        data-start="{{ json_encode($priceRange ?? [0,20000]) }}"
                        wire:on:priceRangeChanged="setPriceRange($event.detail)"
                        >
                    </div>
                </div>
                {{-- DATA (Mo/Go) --}}
                <div class="col-sm-12 col-md-6 px-4 mt-2 form-group mb-3" wire:ignore>
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
                <div class="col-sm-12 col-md-6 px-4 mt-2 form-group mb-3" wire:ignore>
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
                <div class="col-sm-12 col-md-6 px-4 mt-2 form-group" wire:ignore>
                    <label class="noUI-label">
                        <span class="bi bi-filter">{{ __('offers-features.nbr_sms') }}</span>
                    </label>
                    <div id="smsSlider"
                        data-event="smsRangeChanged"
                        data-min="0" data-max="1000" data-step="10"
                        data-start="{{ json_encode($smsRange) }}"
                        data-format="sms"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto row comparison-wrapper" >
        <div class="left-column">
            @if(!empty($operatorDataA))
                <div class="comparison-header schoola">
                    @if($operatorDataA->images && !empty($operatorDataA->images->path) && Storage::disk('public')->exists($operatorDataA->images->path))
                        <img src="{{ Storage::disk('public')->url($operatorDataA->images->path) }}" width="100px" alt="{{ $operatorDataA->images->path }}">
                    @else
                        - 
                    @endif
                    {{ $operatorDataA->name }}
                </div>
                <div class="schoola">
                    @forelse($offersA as $offer)
                        <x-offer-comparison-row :offer="$offer" :serviceType="$serviceType">
                            <div class="mb-4">
                                {!! $offer->detailed_description !!}
                            </div>
                        </x-offer-comparison-row>
                    @empty
                        <p class="text-center py-4">{{ __('offers.no_offer_available') }}</p>
                    @endforelse
                </div>
            @endif
        </div>
        <div class="right-column">
            @if(!empty($operatorDataB))
                <div class="comparison-header schoolb">
                    @if($operatorDataB->images && !empty($operatorDataB->images->path) && Storage::disk('public')->exists($operatorDataB->images->path))
                        <img src="{{ Storage::disk('public')->url($operatorDataB->images->path) }}" width="100px" alt="{{ $operatorDataB->images->path }}">
                    @else
                        - 
                    @endif
                    {{ $operatorDataB->name }}
                </div>
                <div class="schoolb">
                    @forelse($offersB as $offer)
                        <x-offer-comparison-row :offer="$offer" :serviceType="$serviceType">
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
                    @empty
                        <div class="alert alert-info my-4">
                            <p class="text-center py-4">{{ __('offers.no_offer_available') }}</p>
                        </div>
                    @endforelse
                </div>
            @endif
        </div>
    </div>
</div>
