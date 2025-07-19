@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1> {{ $programFeature->exists ? 'Modification ' : 'Nouvel enregistrement' }} </h1>
                <form action="{{ $programFeature->exists ? route('program_features.update', $programFeature) : route('program_features.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($programFeature->exists)
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">{{ __('commons.name') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $programFeature->name) }}" required>
                    </div>

                    <button type="submit" class="btn btn-success"><span class="iconify" data-icon="mdi-content-save"></span> {{ __('commons.save')}}</button>
                    <a href="{{ route('program_features.index') }}" class="btn btn-secondary"><span class="iconify" data-icon="mdi-step-backward"></span> {{__('commons.back')}} </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
