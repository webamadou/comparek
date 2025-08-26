@extends('layouts.frontv1')

@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center bank-bilboard">
                    <div class="col-md-8">
                        <h1>{{ __('banks.banks') }}</h1>
                    </div>
                    <div class="col-sm-6 col-md-4 page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust24.svg') }}" alt="comparek" class="img-fluid">
                    </div>
                    <div class="col-12" style="background: #fff">
                        <p>
                            Le secteur bancaire sénégalais est en constante évolution, avec des acteurs comme Ecobank, BOA, CBAO, Société Générale, UBA et bien d’autres, qui rivalisent d’innovations pour proposer des services modernes : banque en ligne, applications mobiles, paiement sans contact, transferts rapides.
                            <br><br>
                            En choisissant <strong>Comparek</strong>, vous accédez à un comparateur fiable qui vous aide à évaluer les offres bancaires, identifier les meilleures opportunités et éviter les mauvaises surprises. Comparek est votre allié pour choisir une banque de confiance au Sénégal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row justify-content-between gy-4">
                @if($banks->count())
                    <div class="row g-3">
                    @foreach($banks as $bank)
                        <div class="col-12 col-md-6 col-lg-4 bank-card-wrapper">
                            <a href="{{ route('view_banks',$bank) }}" class="card h-100 text-decoration-none text-reset">
                                <div class="card-body bank-card row">
                                    <div class="d-flex align-items-center gap-2 card-logo col-3">
                                        @if($bank->images)
                                            <img src="{{ Storage::disk('public')->url($bank->images->path) }}" alt="{{ $bank->name }}">
                                        @else
                                            <img src="{{ asset('default-img.png') }}" alt="{{ $bank->name }}">
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center gap-2 card-details col-9 flex-column justify-content-start">
                                        <h2 class="h6 mb-0">{{ $bank->name }}</h2>
                                        <div>
                                            {{ __('commons.category') }} : <span class="badge bg-light text-dark">{{ strtoupper($bank->category->value) }}</span>
                                        </div>
                                        <div class="mt-1">{{ __('commons.agency') }} : {{ $bank->branches_count }} • GAB : {{ $bank->atms_count }} • Produits : {{ $bank->products_count }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>

                    <div class="mt-4">
                    {{ $banks->links() }}
                    </div>
                @else
                    <div class="alert alert-secondary">Aucune banque trouvée.</div>
                @endif
            </div>
        </div>
    </section>
@endsection
