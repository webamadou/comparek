@extends('layouts/frontv1')
<x-seo-meta :page="$page ?? null" />
@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center telecom-bilboard">
                    <div class="col-sm-6 col-md-8">
                        <h1 class="heading-title">Comparateur des offres Box & mobile</h1>
                    </div>
                    <div class="col-sm-6 col-md-4 page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust11.svg') }}" alt="comparek" class="img-fluid">
                    </div>
                    <div class="col-12">
                        <p class="text-left">
                            Sur cette page, comparez en un coup d’œil les offres mobiles et Internet des principaux opérateurs. Utilisez les filtres par opérateur, technologie (2G/3G/4G/5G, fibre), volume data, options d’appels et bien plus pour affiner votre recherche. Trouvez rapidement l’offre qui correspond parfaitement à vos besoins et à votre budget.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('comparator-operators')
@endsection
