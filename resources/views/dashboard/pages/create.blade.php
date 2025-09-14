@extends('layouts.dashboard')

@php $isEdit = $page->exists; @endphp

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="display-4">
                    {{ __('pages.create') }}
                </h1>
                <form method="post" action="{{ route('page.store') }}">
                    @include('dashboard.pages._form')
                </form>
                @if($page->exists && ! $page->cannot_delete)
                    <form method="post" action="{{ route('page.destroy', $page->slug) }}" class="mt-3" onsubmit="return confirm('{{ __('pages.delete_confirm') }}')">
                        @csrf @method('DELETE')
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
