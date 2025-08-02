@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="display-4">{{ __('posts.posts')}}</h1>
                <a href="{{ route('post.create') }}" class="btn btn-success mb-3">
                    <span class="iconify" data-icon="mdi-database-plus"></span> {{ __('commons.add') }}
                </a>
                @livewire('posts-table')
            </div>
        </div>
    </div>
</div>
@endsection
