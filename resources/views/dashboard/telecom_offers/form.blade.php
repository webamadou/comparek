@extends('layouts.dashboard')

@section('content')
    <div class="body flex-grow-1">
        <div class="container-lg px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="display-4">{{ $offer->exists ? 'Edit' : 'Create' }} Telecom Offer</h1>

                    <form method="POST"
                          action="{{ $offer->exists ? route('telecom_offer.update', $offer) : route('telecom_offer.store') }}">
                        @csrf
                        @if($offer->exists)
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label>Operateur</label>
                            <select name="telecom_operator_id" class="form-control">
                                @foreach($operators as $op)
                                    <option
                                        value="{{ $op->id }}" {{ $offer->telecom_operator_id == $op->id ? 'selected' : '' }}>
                                        {{ $op->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Type de service</label>
                            <select name="telecom_service_type_id" class="form-control">
                                @foreach($serviceTypes as $st)
                                    <option
                                        value="{{ $st->id }}" {{ $offer->telecom_service_type_id == $st->id ? 'selected' : '' }}>
                                        {{ $st->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Nom</label>
                            <input type="text" name="name" value="{{ old('name', $offer->name) }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Courte Description</label>
                            <input type="text" name="short_description"
                                   value="{{ old('short_description', $offer->short_description) }}"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Description détaillée</label>
                            <textarea name="detailed_description"
                                      class="form-control">{{ old('detailed_description', $offer->detailed_description) }}</textarea>
                        </div>

                        <div class="row my-3">
                            <div class="mb-3 col-4">
                                <label>{{__('offers.monthly_price')}}</label>
                                <input type="number" name="price_per_month"
                                       value="{{ old('price_per_month', $offer->price_per_month) }}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="mb-3 col-3">
                                <label>{{__('offers.debit')}}</label>
                                <input type="number" name="debit" value="{{ old('debit', $offer->debit) }}"
                                       class="form-control">
                            </div>
                            <div class="mb-3 col-2">
                                <label class="mb-3">{{__('offers.debit_unit')}}</label><br>
                                <label for="go">Go
                                    <input type="radio" name="debit_unit" value="go"
                                           id="go" {{ $offer->debit_unit == 'go' ? 'checked="checked"' : '' }}>
                                </label> -
                                <label for="mo">Mo
                                    <input type="radio" name="debit_unit" value="mo"
                                           id="mo" {{ $offer->debit_unit == 'mo' ? 'checked="checked"' : '' }}>
                                </label>
                            </div>
                            <div class="mb-3 offset-2 col-5">
                                <label>{{ __('offers.technology') }}</label>
                                <select name="technology" class="form-control">
                                    <option value=""> -</option>
                                    @foreach(\App\Enums\TechnologyEnum::cases() as $tech)
                                        <option
                                            value="{{ $tech->value }}" {{ $offer->telecom_operator_id == $op->id ? 'selected' : '' }}>
                                            {{ $tech->label() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row container">
                                <div class="mb-3 col-6">
                                    <label>Frais d'activation</label>
                                    <input type="number" name="activation_fee"
                                           value="{{ old('activation_fee', $offer->activation_fee) }}"
                                           class="form-control">
                                </div>

                                <div class="mb-3 col-6">
                                    <label>Durée de l'engagement (mois)</label>
                                    <input type="number" name="commitment_duration_months"
                                           value="{{ old('commitment_duration_months', $offer->commitment_duration_months) }}"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="row container">
                                <div class="form-check col-4">
                                    <input class="form-check-input" type="checkbox" name="has_commitment"
                                           value="1" {{ old('has_commitment', $offer->has_commitment) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{__('offers.has_engagement')}}</label>
                                </div>

                                <div class="form-check col-4">
                                    <input class="form-check-input" type="checkbox" name="available_online"
                                           value="1" {{ old('available_online', $offer->available_online) ? 'checked' : '' }}>
                                    <label class="form-check-label">Disponible en ligne ?</label>
                                </div>

                                <div class="form-check col-4">
                                    <input class="form-check-input" type="checkbox" name="is_postpaid"
                                           value="1" {{ old('is_postpaid', $offer->is_postpaid) ? 'checked' : '' }}>
                                    <label class="form-check-label">Est-ce postpayé ?</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">{{ __('commons.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
