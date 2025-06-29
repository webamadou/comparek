@extends('layouts.dashboard')

@section('content')

    <div class="body flex-grow-1">
        <form method="POST" enctype="multipart/form-data"
          action="{{ $operator->exists ? route('telecom_operator.update', $operator) : route('telecom_operator.store') }}">
            @csrf
            @if($operator->exists) @method('PUT') @endif
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
        <div class="container-lg px-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header"><strong>{{__('Modification update')}}</strong></div>
                    <div class="card-body">
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Nom*</label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name', $operator->name) }}" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Site web</label>
                                    <input class="form-control" type="url" name="website_url" value="{{ old('website_url', $operator->website_url) }}" placeholder="Website URL">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                                    <textarea  name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('description', $operator->description) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="logo">Logo</label>
                                    <input class="form-control"  type="file" name="logo_path">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Siege social</label>
                                    <input class="form-control"  type="text" name="headquarters_location" value="{{ old('headquarters_location', $operator->headquarters_location) }}" placeholder="Headquarters">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Existe depuis</label>
                                    <input class="form-control"  type="number" name="established_year" value="{{ old('established_year', $operator->established_year) }}" placeholder="Year">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success"><span class="cil-contrast"></span> Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
