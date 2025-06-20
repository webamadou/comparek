@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="display-4">
                    {{ $serviceType->exists ? 'Edit' : 'Create' }} Telecom Service Type
                </h1>

                <form method="POST"
                      action="{{ $serviceType->exists ? route('telecom_service_type.update', $serviceType) : route('telecom_service_type.store') }}">
                    @csrf
                    @if($serviceType->exists)
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name', $serviceType->name) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ old('description', $serviceType->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
