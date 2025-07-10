<div>
    <section id="list-operators py-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-wrapper filter-form-wrapper">
                        <h1><span class="bi bi-sliders"> </span>{{ __('offers.filter') }}</h1>
                        <div id="filter-wrapper" class="php-email-form">
                            <div class="row">
                                <div class="col-md-12 mt-2 form-group">
                                    <div class="input-group">
                                        <label class="d-flex justify-content-between font-weight-bold">
                                            <span> {{__('commons.price')}} :</span>
                                            <span class="">
                                                {!! $price >= 5000 ? '5000 <sup>' . __('commons.cfa_and_more') . '</sup>': number_format($price, 0, '', ' ') . ' <sup>' . __('commons.cfa') . '</sup>' !!}
                                            </span>
                                        </label>
                                        <input type="range"
                                               min="100"
                                               max="10000"
                                               step="100"
                                               wire:model.change.200ms="price"
                                               class="form-range w-100"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 form-group">
                                    <h3><span class="bi bi-filter"></span> {{__('offers-features.validity_length')}}</h3>
                                    <div class="custom-checkbox-group">
                                        @foreach($this->validityOptions as $k => $days)
                                            <label class="custom-checkbox">
                                                <input type="checkbox" name="validityLength" wire:model.change="validityLength" value="{{ $days }}">
                                                <span>{{ $days . ' ' . trans_choice('offers-features.day', $days) }} {{ $days == 30 ? '+' : '' }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 form-group">
                                    <div class="input-group">
                                        <label class="d-flex justify-content-between font-weight-bold">
                                            <span class="bi bi-filter"> {{ __('offers-features.data') }} :</span>
                                            <span class="">
                                                {!! $data >= 1024 ? '1<sup>Go</sup> ' . __('offers-features.and_more') : number_format($data, 0, '', ' ') . '<sup>Mo</sup>' !!}
                                            </span>
                                        </label>
                                        <input type="range"
                                               min="10"
                                               max="1048"
                                               step="10"
                                               wire:model.change.200ms="data"
                                               class="form-range w-100"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 form-group">
                                    <div class="input-group">
                                        <label class="d-flex justify-content-between font-weight-bold">
                                            <span class="bi bi-filter"> {{ __('offers-features.call_minutes') }} :</span>
                                            <span class="">
                                                {{ $voiceMinutes >= 1000 ? '1 000 minutes et +' : number_format($voiceMinutes, 0, '', ' ') . 'minutes' }}
                                            </span>
                                        </label>
                                        <input type="range"
                                               min="10"
                                               max="1000"
                                               step="10"
                                               wire:model.change.200ms="voiceMinutes"
                                               class="form-range w-100"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 form-group">
                                    <div class="input-group">
                                        <label class="d-flex justify-content-between font-weight-bold">
                                            <span class="bi bi-filter"> {{ __('offers-features.nbr_sms') }} :</span>
                                            <span class="">
                                                {{ $sms_nbr >= 1000 ? '1 000 et +' : number_format($sms_nbr, 0, '', ' ')  }}
                                            </span>
                                        </label>
                                        <input type="range"
                                               min="10"
                                               max="1000"
                                               step="10"
                                               wire:model.change.200ms="sms_nbr"
                                               class="form-range w-100"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 form-group">
                                    <div class="input-group">
                                        <label class="d-flex justify-content-between font-weight-bold">
                                            <span class="bi bi-filter"> {{ __('offers-features.phone_credit') }} :</span>
                                            <span class="">
                                                {{ $phoneCredit >= 10000 ? '10 000 et +' : number_format($phoneCredit, 0, '', ' ')  }}
                                            </span>
                                        </label>
                                        <input type="range"
                                               min="100"
                                               max="10000"
                                               step="100"
                                               wire:model.change.200ms="phoneCredit"
                                               class="form-range w-100"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4 form-group">
                                    <h3 class="m-0"><span class="bi bi-filter"></span> {{__('offers.operators')}}</h3>
                                    <div class="custom-checkbox-group">
                                        @foreach($operators as $op)
                                            <label class="custom-checkbox">
                                                <input type="checkbox" name="operator" wire:model.change="operator" value="{{ $op->id }}">
                                                <span>{{ $op->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 form-group">
                                    <div class="custom-checkbox-group">
                                        <h3 class="m-0"><span class="bi bi-filter"></span> Comparek Score</h3>
                                        @foreach($scores as $score)
                                            <label for="{{ "score_{$score->value}" }}" class="custom-checkbox">
                                                <input id="{{ "score_{$score->value}" }}" type="checkbox" name="score" value="{{ $score->value }}" wire:model.change="score">
                                                <span>{{ $score->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 form-group sorting">
                                    <div class="custom-checkbox-group">
                                        <h3 class="m-0"><span class="bi bi-filter"></span> {{ __('commons.sort') }}</h3>
                                        <label for="sort_price" class="custom-checkbox">
                                            <input id="sort_price" type="radio" name="sortBy" value="price" wire:model.change="sortBy">
                                            <span>{{ __('commons.price') }}</span>
                                        </label>
                                        <label for="sort_data" class="custom-checkbox">
                                            <input id="sort_data" type="radio" name="sortBy" value="data_volume_unit" wire:model.change="sortBy">
                                            <span>{{ __('offers-features.data') }}</span>
                                        </label>
                                        <label for="sort_minutes" class="custom-checkbox">
                                            <input id="sort_minutes" type="radio" name="sortBy" value="voice_minutes" wire:model.change="sortBy">
                                            <span>{{ __('offers-features.call_minutes') }}</span>
                                        </label>
                                        <label for="sort_credit" class="custom-checkbox">
                                            <input id="sms_nbr" type="radio" name="sortBy" value="sms_nbr" wire:model.change="sortBy">
                                            <span>{{ __('offers-features.nbr_sms') }}</span>
                                        </label>
                                        <label for="sort_credit" class="custom-checkbox">
                                            <input id="sort_credit" type="radio" name="sortBy" value="phone_credit" wire:model.change="sortBy">
                                            <span>{{ __('offers-features.phone_credit') }}</span>
                                        </label>
                                        <label for="sort_note" class="custom-checkbox">
                                            <input id="sort_note" type="radio" name="sortBy" value="sort_note" wire:model.change="sortBy">
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
