@extends('layouts.dashboard')

@php
    use App\Enums\BankCategory;
    /** @var \App\Models\Bank|null $bank */
    $isEdit = $bank->exists;
@endphp

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="display-4">
                    {{ $isEdit ? 'Modification ' : 'Ajouter' }}
                </h1>
                <form action="{{ $isEdit ? route('bank.update', $bank->id) : route('bank.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif

                    <div class="space-y-5 row">
                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label">Nom de la banque *</label>
                            <input type="text" name="name" value="{{ old('name', $bank->name ?? '') }}" class="mt-1 w-full border rounded px-3 py-2 form-control" required>
                            @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Logo path (texte simple; tu peux remplacer par un upload plus tard) --}}
                        <div class="mb-3">
                            <label for="logo_path" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo_path">
                            @if($bank->logo_path)
                                <img src="{{ Storage::url($bank->logo_path) }}" alt="Logo" height="60" class="mt-2">
                            @endif
                            @error('logo_path') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Website / Email / Phone --}}
                        <div class="d-flex justify-content-between">
                            <div class="col">
                                <label class="block text-sm font-medium form-label">Site web</label>
                                <input type="url" name="website_url" value="{{ old('website_url', $bank->website_url ?? '') }}" class="mt-1 w-full border rounded px-3 py-2 form-control">
                                @error('website_url') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="col">
                                <label class="block text-sm font-medium form-label">Email</label>
                                <input type="email" name="email" value="{{ old('email', $bank->email ?? '') }}" class="mt-1 w-full border rounded px-3 py-2 form-control">
                                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium form-label">Téléphone</label>
                                <input type="text" name="phone" value="{{ old('phone', $bank->phone ?? '') }}" class="mt-1 w-full border rounded px-3 py-2 form-control">
                                @error('phone') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div><hr></div>
                        {{-- Country / BIC / Licence --}}
                        <div class="d-flex justify-content-between">
                            <div class="col">
                                <label class="block text-sm font-medium form-label">Pays (code ISO 2) *</label>
                                <input type="text" name="country_code" value="{{ old('country_code', $bank->country_code ?? 'SN') }}" class="mt-1 w-full border rounded px-3 py-2 form-control" required>
                                @error('country_code') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="col">
                                <label class="block text-sm font-medium form-label">SWIFT/BIC</label>
                                <input type="text" name="swift_bic" value="{{ old('swift_bic', $bank->swift_bic ?? '') }}" class="mt-1 w-full border rounded px-3 py-2 form-control">
                                @error('swift_bic') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="col">
                                <label class="block text-sm font-medium form-label">N° d’agrément</label>
                                <input type="text" name="regulatory_license" value="{{ old('regulatory_license', $bank->regulatory_license ?? '') }}" class="mt-1 w-full border rounded px-3 py-2 form-control">
                                @error('regulatory_license') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mb-4"><hr></div>

                        {{-- HQ / Year / Category / Active --}}
                        <div class="d-flex justify-content-between">
                            <div class="col">
                                <label class="block text-sm font-medium form-label">Siège (ville / adresse)</label>
                                <input type="text" name="headquarters_location" value="{{ old('headquarters_location', $bank->headquarters_location ?? '') }}" class="mt-1 w-full border rounded px-3 py-2 form-control">
                                @error('headquarters_location') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="col">
                                <label class="block text-sm font-medium form-label">Année de création</label>
                                <input type="number" name="established_year" value="{{ old('established_year', $bank->established_year ?? '') }}" class="mt-1 w-full border rounded px-3 py-2 form-control" min="1800" max="{{ date('Y') }}">
                                @error('established_year') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="col">
                            <label class="block text-sm font-medium form-label">Catégorie *</label>
                            <select name="category" class="mt-1 w-full border rounded px-3 py-2 form-control" required>
                                @foreach(BankCategory::cases() as $case)
                                <option value="{{ $case->value }}" @selected(old('category', $bank->category->value ?? 'bank') === $case->value)>{{ __('banks.' . $case->value) }}</option>
                                @endforeach
                            </select>
                            @error('category') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="my-4">
                            <input id="is_active" type="checkbox" name="is_active" value="1" @checked(old('is_active', ($bank->is_active ?? true)) )>
                            <label for="is_active" class="text-sm form-label">Active</label>
                            @error('is_active') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Description --}}
                        <div>
                            <label class="block text-sm font-medium form-label">Description</label>
                            <textarea name="description" rows="4" class="mt-1 w-full border rounded px-3 py-2 form-control">{{ old('description', $bank->description ?? '') }}</textarea>
                            @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="col my-4">
                            <a href="{{ route('bank.index') }}" class="btn btn-success"><span class="iconify" data-icon="mdi-step-backward"></span> Retour</a>
                            <button type="submit" class="btn btn-primary"><span class="iconify" data-icon="mdi-content-save"></span> Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
