@extends('layouts.dashboard')

@section('content')
    <div class="body flex-grow-1">
        <div class="container-lg px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="display-4">
                        {{ __('posts.categories') }} - <a href="{{route('schools.create')}}"></a>
                        <a href="{{route('schools.create')}}" class="btn btn-primary"> <span class="mdi mdi-users"></span> {{ __('commons.add') }}</a>
                    </h1>
                    <div class="example">
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1002">
                                <livewire:category-table />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
