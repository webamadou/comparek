@extends('layouts.dashboard')

@section('content')
    <div class="body flex-grow-1">
        <div class="container-lg px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="display-4">
                        {{ __('schools.programs') }} - 
                        <a href="{{route('school_programs.create')}}" class="btn btn-primary"> <span class="iconify" data-icon="mdi-plus"></span> {{ __('commons.add') }}</a>
                    </h1>
                    <div class="example">
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1002">
                                <livewire:school-programs-table />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
