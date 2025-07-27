@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="display-4">
                    {{ $school->exists ? 'Modification ' : 'Ajouter' }}
                </h1>
                <form action="{{ $school->exists ? route('schools.update', $school) : route('schools.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($school->exists)
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom de l'école</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $school->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="logo_path" class="form-label">Logo</label>
                        <input type="file" class="form-control" name="logo_path">
                        @if($school->logo_path)
                            <img src="{{ Storage::url($school->logo_path) }}" alt="Logo" height="60" class="mt-2">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Courte Description</label>
                        <textarea name="description" class="form-control">{{ old('description', $school->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="full_description" class="form-label">Longue Description</label>
                        <textarea name="full_description" class="form-control" rows="5">{{ old('full_description', $school->full_description) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="founding_year" class="form-label">Existe depuis:</label>
                            <input type="text" name="founding_year" class="form-control" value="{{ old('founding_year', $school->founding_year) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="website_url" class="form-label">Sit web:</label>
                            <input type="url" name="website_url" class="form-control" value="{{ old('website_url', $school->website_url) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">{{ __('schools.is_private') }}</label>
                            <select name="is_private" class="form-select">
                                <option value=""> --- </option>
                                <option value="1" {{ old('is_private', $school->is_private == 1) ? 'selected' : '' }}>{{ __('commons.yes') }}</option>
                                <option value="2" {{ old('is_private', $school->is_private == 2) ? 'selected' : '' }}>
                                    {{ __('commons.no') }}</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">{{ __('schools.include_an_incubator') }}</label>
                            <select name="has_incubator" class="form-select">
                                <option value=""> --- </option>
                                <option value="1" {{ old('has_incubator', $school->has_incubator == 1) ? 'selected' : '' }}>{{ __('commons.yes') }}</option>
                                <option value="2" {{ old('has_incubator', $school->has_incubator == 2) ? 'selected' : '' }}>{{ __('commons.no') }}</option></select>
                        </div>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="website_url" class="form-label">Website</label>
                        <input type="url" name="website_url" class="form-control" value="{{ old('website_url', $school->website_url) }}">
                    </div> -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $school->email) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $school->phone) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label">Adresse</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address', $school->address) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="city" class="form-label">Ville</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city', $school->city) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="country" class="form-label">Pays</label>
                            <input type="text" name="country" class="form-control" value="{{ old('country', $school->country ?? 'Sénégal') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Accepte les étudiants étrangers ?</label>
                            <select name="accepts_foreign_students" class="form-select">
                                <option value="1" {{ old('accepts_foreign_students', $school->accepts_foreign_students) ? 'selected' : '' }}>Oui</option>
                                <option value="0" {{ old('accepts_foreign_students', !$school->accepts_foreign_students) ? 'selected' : '' }}>Non</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Activée?</label>
                            <select name="is_active" class="form-select">
                                <option value="1" {{ old('is_active', $school->is_active) ? 'selected' : '' }}>Oui</option>
                                <option value="0" {{ old('is_active', !$school->is_active) ? 'selected' : '' }}>Non</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success"><span class="iconify" data-icon="mdi-content-save"></span> Enregistrer</button>
                    <a href="{{ route('schools.index') }}" class="btn btn-secondary"><span class="iconify" data-icon="mdi-step-backward"></span> Retour</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
