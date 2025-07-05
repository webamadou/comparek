@extends('layouts/frontv1')

@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title">Comparateur des offres Box & mobile</h1>
                        <p class="text-left">
                            Sur cette page, comparez en un coup d’œil les offres mobiles et Internet des principaux opérateurs. Utilisez les filtres par opérateur, technologie (2G/3G/4G/5G, fibre), volume data, options d’appels et bien plus pour affiner votre recherche. Trouvez rapidement l’offre qui correspond parfaitement à vos besoins et à votre budget.
                        </p>
                    </div>
                    <div class="col-lg-4 d-none d-md-block">
                        <img src="{{ asset('frontv1/img/illustration/illust11.svg') }}" alt="comparek" style="width: 20vw;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('comparator-operators')
@endsection
