@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1> {{ $school_program->exists ? 'Modification ' : 'Nouvel enregistrement' }} </h1>
                <form action="{{ $school_program->exists ? route('school_programs.update', $school_program) : route('school_programs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($school_program->exists)
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">{{ __('commons.name') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $school_program->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('commons.description') }}</label>
                        <textarea name="description">{{ old('description', $school_program->description) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('schools.school') }}</label>
                            <select name="school_id" class="form-select" required>
                                <option value="">-- {{ __('commons.select') }} --</option>
                                @foreach ($schools as $id => $school)
                                    <option value="{{ $id }}" {{ old('school_id', $school_program->school_id) == $id ? 'selected' : '' }}>
                                        {{ $school }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Domain</label>
                            <select name="program_domain_id" class="form-select" required>
                                <option value="">-- Select Domain --</option>
                                @foreach ($domains as $id => $domain)
                                    <option value="{{ $id }}" {{ old('domain_id', $school_program->program_domain_id) == $id ? 'selected' : '' }}>
                                        {{ $domain }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('schools.level') }}</label>
                            <select name="level" class="form-select" required>
                                @foreach (\App\Enums\ProgramLevelEnum::values() as $level)
                                    <option value="{{ $level }}" {{ old('level', $school_program->level->value ?? '') === $level ? 'selected' : '' }}>
                                        {{ $level }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">{{ __('schools.duration') . ' (' . __('commons.year') .')' }}</label>
                            <input type="number" name="duration_years" class="form-control" min="1" max="10" value="{{ old('duration_years', $school_program->duration_years) }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">{{ __('schools.modality') }}</label>
                            <select name="modality" class="form-select">
                                <option value="">-- {{ __('commons.select') }} --</option>
                                @foreach (\App\Enums\ProgramModalityEnum::values() as $modality)
                                    <option value="{{ $modality }}" {{ old('modality', $school_program->modality) === $modality ? 'selected' : '' }}>
                                        {{ $modality }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Langues</label>
                            <select name="language" class="form-select">
                                <option value="">-- {{ __('commons.select') }} --</option>
                                @foreach (\App\Enums\LanguageEnum::values() as $lang)
                                    <option value="{{ $lang }}" {{ old('language', $school_program->language) === $lang ? 'selected' : '' }}>
                                        {{ $lang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('schools.is_accredited') }}</label>
                            <select name="is_accredited" class="form-select">
                                <option value="1" {{ old('is_accredited', $school_program->is_accredited) ? 'selected' : '' }}>
                                    {{ __('commons.yes') }}</option>
                                <option value="0" {{ old('is_accredited', !$school_program->is_accredited) ? 'selected' : '' }}>{{ __('commons.no') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">{{ __('schools.registration_fee') }}</label>
                            <input type="number" name="registration_fee" class="form-control" value="{{ old('registration_fee', $school_program->registration_fee) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">{{ __('schools.tuition_fee') }}</label>
                            <input type="number" name="tuition_fee" class="form-control" value="{{ old('tuition_fee', $school_program->tuition_fee) }}">
                        </div>
                        <div class="col-md-1 mb-3">
                            <label class="form-label">{{ __('commons.currency') }}</label>
                            <select name="tuition_currency" class="form-select">
                                @foreach (['FCFA', 'EUR', 'USD'] as $currency)
                                    <option value="{{ $currency }}" {{ old('tuition_currency', $school_program->tuition_currency) === $currency ? 'selected' : '' }}>
                                        {{ $currency }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">{{ __('schools.tuition_description') }}</label>
                            <input type="text" name="tuition_description" class="form-control" value="{{ old('tuition_description', $school_program->tuition_description) }}">
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('schools.program_features') }} (Selection multiple possible)</label>
                        <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                            @foreach ($features as $id => $feature)
                                <input type="checkbox" name="feature_ids[]" value="{{ $id }}" id="feature{{ $id }}" class="btn-check"
                                    {{ in_array($id, old('feature_ids', $school_program->features?->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                <label class="btn btn-outline-success" for="feature{{ $id }}">{{ $feature }}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="row my-4">
                        <label for="">Accreditation (Selection multiple possible)</label>
                        <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                            @foreach($accreditations as $id => $accred)
                                <input type="checkbox" name="accreditation_ids[]" value="{{ $id }}" class="btn-check" id="accred{{ $id }}" autocomplete="off" {{ in_array($id, old('accreditation_ids', $school_program->accreditationBodies?->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                <label class="btn btn-outline-primary" for="accred{{$id}}">{{ $accred }}</label>
                            @endforeach
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
