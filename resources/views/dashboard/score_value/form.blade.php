@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">

                <h1 class="display-4">
                    {{ $score->exists ? 'Editer' : 'Ajouter' }} Comparek Score
                </h1>

                <form method="POST"
                      action="{{ $score->exists ? route('score_value.update', $score) : route('score_value.store') }}">
                    @csrf
                    @if($score->exists)
                        @method('PUT')
                    @endif

                    {{-- Display error messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label>Criteria</label>
                        <select name="score_criteria_id" class="form-control @error('score_criteria_id') is-invalid @enderror" required>
                            <option value="">Choose</option>
                            @foreach ($criteria as $item)
                                <option value="{{ $item->id }}" @selected(old('score_criteria_id', $score->score_criteria_id) == $item->id)>
                                    {{ $item->name }} ({{ $item->vertical->label() }})
                                </option>
                            @endforeach
                        </select>
                        @error('score_criteria_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Entity Type</label>
                        <input type="text" name="vertical_entity_type" value="{{ old('vertical_entity_type', $score->vertical_entity_type) }}" class="form-control @error('vertical_entity_type') is-invalid @enderror" placeholder="App\Models\TelecomOffer" required>
                        @error('vertical_entity_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Entity ID</label>
                        <input type="number" name="vertical_entity_id" value="{{ old('vertical_entity_id', $score->vertical_entity_id) }}" class="form-control @error('vertical_entity_id') is-invalid @enderror" required>
                        @error('vertical_entity_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Score Value</label>
                        <input type="number" step="0.01" name="value" value="{{ old('value', $score->value) }}" class="form-control @error('value') is-invalid @enderror" required>
                        @error('value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('score_value.index') }}" class="btn btn-secondary">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
