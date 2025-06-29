@extends('layouts.argon')

@section('content')
    <h1 class="page-title">Liste des fournisseurs internet et des opérateurs mobiles au Sénégal en 2025</h1>
    <section class="footer has-cards">
        <div class="container container-lg">
            <div class="row">
                @foreach($operators as $key => $operator)
                    <div class="col-md-4 mb-5 mb-md-0 mozaiques">
                        <div class="card card-lift--hover shadow border-0 px-2">
                            <p class="operator-title">{{ $operator->name }}</p>
                            <p>{!! $operator->description !!}</p>
                            <img src="{{ Storage::disk('public')->url($operator->images->path) }}" width="100" alt="{{ $operator->images->path }}">
                            <a href="#" class="btn btn-primary btn-block active" type="button"> Plus d'info </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
