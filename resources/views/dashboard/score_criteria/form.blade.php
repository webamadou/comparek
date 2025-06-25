@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="mb-2">
            <a href="{{route('score_criteria.index')}}" class="btn btn-primary">
                <span class="iconify" data-icon="mdi-transfer-left"></span> &nbsp;Retour
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="display-4">
                    {{ $criteria->exists ? 'Edit' : 'Create' }} Comparek Score Criteria
                </h1>
                    {{-- Display global errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form method="POST"
                      action="{{ $criteria->exists ? route('score_criteria.update', $criteria) : route('score_criteria.store') }}">
                    @csrf
                    @if($criteria->exists)
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label>Vertical</label>
                        <select name="vertical" class="form-control" required>
                            @foreach ($verticals as $vertical)
                                <option value="{{ $vertical->value }}" {{ $criteria->vertical === $vertical ? 'selected' : '' }}>
                                    {{ $vertical->label() }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Nom du critère</label>
                        <input type="text" name="name" value="{{ old('name', $criteria->name) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Pondération</label>
                        <input type="number" name="weight" value="{{ old('weight', $criteria->weight) }}" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
