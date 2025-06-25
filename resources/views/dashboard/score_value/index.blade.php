@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="display-4">Comparek Score des Offres</h1>
                @livewire('score-value-table')
            </div>
        </div>
    </div>
</div>
@endsection
