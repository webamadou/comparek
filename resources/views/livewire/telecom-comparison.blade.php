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
            <div><a href="#" wire:click.prevent="resetFields"> <span class="bi-arrow-clockwise"></span>{{ __('filters.reset') }}</a></div>
        </div>
        <div class="{{ $serviceType === 'internet' ? '' : 'd-none' }} row col-12 m-0 p-0">
            <div class="col-md-6 my-2 form-group">
                <div class="input-group">
                    <label class="d-flex slider-label">
                        <span> {{ __('commons.price') }} :</span>
                        <span class="">
                            {{ $pricePerMonthMin >= $defaultPricePerMonthMax ? '25 000 CFA et +' : number_format($pricePerMonthMin, 0, '', ' ') . 'CFA' }}
                        </span>
                    </label>
                    <input type="range"
                            min="100"
                            max="{{ $defaultPricePerMonthMax }}"
                            step="100"
                            wire:model.live.200ms="pricePerMonthMin"
                            class="form-range w-100"
                    >
                </div>
            </div>
            <div class="col-md-6 my-2 form-group">
                <div class="custom-checkbox-group">
                    <h3><span class="bi bi-filter"></span> {{ __('offers.technologies') }}</h3>
                    @foreach(\App\Enums\TechnologyEnum::cases() as $techno)
                        <label for="{{ $techno->value }}" class="custom-checkbox">
                            <input id="{{ $techno->value }}" type="radio" name="technology"
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
        <div class="col-md-3 mt-2 form-group">
            <div class="col-md-12 my-2 form-group">
                <div class="input-group">
                    <label class="d-flex justify-content-between font-weight-bold">
                        <span> {{__('commons.price')}} </span>
                        <span class="">
                            {!! $price >= 5000 ? ' : 5000 <sup>' . __('commons.cfa_and_more') . '</sup>': ($price > 0 ? ' : ' . number_format($price, 0, '', ' ') . ' <sup>' . __('commons.cfa') . '</sup>' : '') !!}
                        </span>
                    </label>
                    <input type="range"
                            min="0"
                            max="5500"
                            step="100"
                            wire:model.live.200ms="price"
                            class="form-range w-100"
                    >
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-2 form-group">
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
        <div class="col-md-3 mt-2 form-group">
            <div class="input-group">
                <label class="d-flex justify-content-between font-weight-bold">
                    <span class="bi bi-filter"> {{ __('offers-features.data') }} </span>
                    <span class="">
                        {!! $data >= 1024 ? ' : 1<sup>Go</sup> ' . __('offers-features.and_more') : ($data > 0 ? ' : ' . number_format($data, 0, '', ' ') . '<sup>Mo</sup>' : '') !!}
                    </span>
                </label>
                <input type="range"
                        min="0"
                        max="1048"
                        step="10"
                        wire:model.live.200ms="data"
                        class="form-range w-100"
                >
            </div>
        </div>
        <div class="col-md-3 mt-2 form-group">
            <div class="input-group">
                <label class="d-flex justify-content-between font-weight-bold">
                    <span class="bi bi-filter"> {{ __('offers-features.call_minutes') }} </span>
                    <span class="">
                        {{ $voiceMinutes >= 1000 ? ' : 1 000 min et +' : ( $voiceMinutes > 0 ? ' : ' . number_format($voiceMinutes, 0, '', ' ') . 'min' : '')}}
                    </span>
                </label>
                <input type="range"
                        min="0"
                        max="1000"
                        step="10"
                        wire:model.live.200ms="voiceMinutes"
                        class="form-range w-100"
                >
            </div>
        </div>
        <div class="col-md-3 mt-2 form-group">
            <div class="input-group">
                <label class="d-flex justify-content-between font-weight-bold">
                    <span class="bi bi-filter"> {{ __('offers-features.nbr_sms') }} </span>
                    <span class="">
                        {{ $sms_nbr >= 1000 ? ' : 1 000 et +' : ($sms_nbr > 0 ? ' : ' . number_format($sms_nbr, 0, '', ' ') : '') }}
                    </span>
                </label>
                <input type="range"
                        min="0"
                        max="1000"
                        step="10"
                        wire:model.live.200ms="sms_nbr"
                        class="form-range w-100"
                >
            </div>
        </div>
        <div class="col-md-3 mt-2 form-group">
            <div class="input-group">
                <label class="d-flex justify-content-between font-weight-bold">
                    <span class="bi bi-filter"> {{ __('offers-features.phone_credit') }} </span>
                    <span class="">
                        {{ $phoneCredit >= 10000 ? ' : 10 000 et +' : ($phoneCredit > 0 ? ' : ' . number_format($phoneCredit, 0, '', ' ') : '')  }}
                    </span>
                </label>
                <input type="range"
                        min="0"
                        max="10000"
                        step="100"
                        wire:model.live.200ms="phoneCredit"
                        class="form-range w-100"
                >
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
