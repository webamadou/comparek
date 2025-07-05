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
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="form-wrapper filter-form-wrapper">
                        <h1>Filtrer les offres</h1>
                        <div if="filter-wrapper" class="php-email-form">
                            <div class="row">
                                <div class="col-md-12 my-2 form-group">
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
                                <div class="col-md-12 my-2 form-group">
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
                                <div class="col-md-12 my-2 form-group">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-filter"></i></span>
                                        <input type="email" class="form-control" name="offer_type" placeholder="Type d’offre">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    @foreach($telecomOffers as $offer)
                        <div class="col-lg-12 col-md-12 row my-3 offer-row">
                            <div class="offers-list">
                                <div class="d-flex align-items-center mb-4 offer-wrapper justify-content-between" data-aos="fade-up" data-aos-delay="200">
                                    <div class="offer-detail text-center operator">
                                        {{ $offer->operator->name }} <br>
                                        <img src="{{ Storage::disk('public')->url($offer->operator->images->thumb_path) }}" alt="{{ $offer->operator->name }}" width="55px" height="55px">
                                    </div>
                                    <div class="offer-detail">
                                        <strong><a href="#">{{ $offer->name }}</a></strong>
                                    </div>
                                    @if (! empty($offer->serviceType))
                                        <div class="offer-detail service_type">
                                            <strong>{{ $offer->serviceType->name }}</strong>
                                        </div>
                                    @endif
                                    <div class="offer-detail offer-price">
                                        @if ((int) $offer->price_per_month > 0)
                                            {{ $offer->price_per_month }}
                                        @endif

                                        @if (! empty($offer->features))
                                            @foreach($offer->features as $feature)
                                                {{ $feature->price }}<br>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="offer-detail has_commitment">
                                        <strong>{{ $offer->has_commitment === true ? 'Avec engagement' : 'Sans engagement' }}</strong>
                                    </div>
                                    <div class="offer-detail has_commitment">
                                        <x-comparek-score-badge :grade="$offer->currentScoreGrade()" :size="'small'" />
                                    </div>
                                </div>
                            </div>
                            <div class="details-collapsed" id="details-collapsed_{{ $offer->id }}">

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        {{--<div>{ { $ telecomOffers->links() }}</div>--}}
    </section>
</div>
