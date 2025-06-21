@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="display-4">
                    {{ $feature->exists ? 'Editer' : 'Ajouter' }} une option d'offre telecom
                </h1>

                <form method="POST"
                      action="{{ $feature->exists ? route('telecom_offer_feature.update', $feature) : route('telecom_offer_feature.store') }}">
                    @csrf
                    @if($feature->exists)
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label>Offre</label>
                        <select name="telecom_offer_id" class="form-control" required>
                            @foreach($offers as $offer)
                                <option value="{{ $offer->id }}" {{ $feature->telecom_offer_id == $offer->id ? 'selected' : '' }}>
                                    {{ $offer->name }} - [{{ $offer->operator?->name  }}]
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Nom (optionel)</label>
                        <input type="text" name="name" value="{{ old('name', $feature->name) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Capacité</label>
                        <select name="capacity" class="form-control" required>
                            @php
                                $featureNames = ['data_volume', 'voice_minutes', 'sms', 'speed', 'tv_channels'];
                            @endphp
                            @foreach($featureNames as $name)
                                <option value="{{ $name }}" {{ $feature->capacity == $name ? 'selected' : '' }}>
                                    {{ ucfirst(str_replace('_', ' ', $name)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Valeur</label>
                        <input type="text" name="value" value="{{ old('value', $feature->value) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Unité</label>
                        <input type="text" name="unit" value="{{ old('unit', $feature->unit) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Prix</label>
                        <input type="text" name="price" value="{{ old('price', $feature->price) }}" class="form-control">
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_highlighted" value="1" class="form-check-input" {{ old('is_highlighted', $feature->is_highlighted) ? 'checked' : '' }}>
                        <label class="form-check-label">Mis en évidence?</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
