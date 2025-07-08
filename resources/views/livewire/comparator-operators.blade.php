<div>
    <section id="opertors-offers-list" class="py-0" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-5">
                    <div class="form-wrapper">
                        <div if="filter-wrapper" class="php-email-form">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-filter"></i></span>
                                        <select name="operators" id="operators" class="form-control" wire:model.change="operator">
                                            <option value=""> - </option>
                                            @foreach($operators as $op)
                                                <option value="{{ $op->id }}">{{ $op->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 form-group">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-filter"></i></span>
                                        <select name="serviceTypes" id="serviceTypes" class="form-control" wire:model.change="serviceType">
                                            <option value=""> - </option>
                                            @foreach($serviceTypes as $st)
                                                <option value="{{ $st->id }}">{{ $st->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 form-group">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-filter"></i></span>
                                        <input type="email" class="form-control" name="offer_type" placeholder="Type d’offre">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="list-operators">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-wrapper filter-form-wrapper">
                        <h1><span class="bi bi-sliders"></span>{{ __('') }}</h1>
                        <div if="filter-wrapper" class="php-email-form">
                            <div class="row">
                                <div class="col-md-12 my-4 form-group">
                                    <h3><span class="bi bi-filter"></span> {{__('offers.operators')}}</h3>
                                    <div class="custom-checkbox-group">
                                        @foreach($operators as $op)
                                            <label class="custom-checkbox">
                                                <input type="checkbox" name="operator" wire:model.change="operator" value="{{ $op->id }}">
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
                                                <input type="checkbox" name="serviceTypes" id="{{ "service_{$st->id}" }}" value="{{ $st->id }}" wire:model.change="serviceType">
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
                                                <input id="{{ "score_{$score->value}" }}" type="checkbox" name="score" value="{{ $score->value }}" wire:model.change="score">
                                                <span>{{ $score->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 my-2 form-group">
                                    <div class="input-group">
                                        <label class="d-flex justify-content-between font-weight-bold">
                                            <span>MAX :</span>
                                            <span class="">
                                                {{ $pricePerMonthMin >= 100000 ? '100 000 CFA et +' : number_format($pricePerMonthMin, 0, '', ' ') . 'CFA' }}
                                            </span>
                                        </label>
                                        <input type="range"
                                               min="100"
                                               max="100000"
                                               step="100"
                                               wire:model.change.200ms="pricePerMonthMin"
                                               class="form-range w-100"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12 my-2 form-group">
                                    <div class="custom-checkbox-group">
                                        <h3><span class="bi bi-filter"></span> {{ __('offers.technologies') }}</h3>
                                        @foreach(\App\TechnologyEnum::cases() as $techno)
                                            <label for="{{ $techno->value }}" class="custom-checkbox">
                                                <input id="{{ $techno->value }}" type="checkbox" name="technology" value="{{ $techno->value }}" wire:model.change="technology">
                                                <span>{{ $techno->label() }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    @foreach($telecomOffers as $offer)
                        <x-offer-row :offer="$offer">
                            {!! $offer->detailed_descrition !!}
                            <ul>
                                <li>
                                    <strong>{{__('offers.subscription_fee')}}</strong> {{ $offer->activation_fee }}
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
