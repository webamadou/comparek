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
                    @if($offer->exists) @method('PUT') @endif

                    <div class="mb-3">
                        <label>Operator</label>
                        <select name="telecom_operator_id" class="form-control">
                            @foreach($operators as $op)
                                <option value="{{ $op->id }}" {{ $offer->telecom_operator_id == $op->id ? 'selected' : '' }}>
                                    {{ $op->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Service Type</label>
                        <select name="telecom_service_type_id" class="form-control">
                            @foreach($serviceTypes as $st)
                                <option value="{{ $st->id }}" {{ $offer->telecom_service_type_id == $st->id ? 'selected' : '' }}>
                                    {{ $st->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name', $offer->name) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Short Description</label>
                        <input type="text" name="short_description" value="{{ old('short_description', $offer->short_description) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Detailed Description</label>
                        <textarea name="detailed_description" class="form-control">{{ old('detailed_description', $offer->detailed_description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Price per month</label>
                        <input type="number" name="price_per_month" value="{{ old('price_per_month', $offer->price_per_month) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Activation Fee</label>
                        <input type="number" name="activation_fee" value="{{ old('activation_fee', $offer->activation_fee) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Commitment Duration (months)</label>
                        <input type="number" name="commitment_duration_months" value="{{ old('commitment_duration_months', $offer->commitment_duration_months) }}" class="form-control">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_postpaid" value="1" {{ old('is_postpaid', $offer->is_postpaid) ? 'checked' : '' }}>
                        <label class="form-check-label">Is Postpaid?</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="has_commitment" value="1" {{ old('has_commitment', $offer->has_commitment) ? 'checked' : '' }}>
                        <label class="form-check-label">Has Commitment?</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="available_online" value="1" {{ old('available_online', $offer->available_online) ? 'checked' : '' }}>
                        <label class="form-check-label">Available Online?</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
