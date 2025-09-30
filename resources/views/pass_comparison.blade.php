@extends('layouts/frontv1')
<x-seo-meta :page="$page ?? []" />
@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center telecom-bilboard">
                    <div class="col-lg-8 page-bilboard-text">
                        <h1 class="heading-title">Comparateur des offres mobile</h1>
                    </div>
                    <div class="col-lg-4 page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust12.svg') }}" alt="comparek" class="img-fluid">
                    </div>
                    <div class="col-12">
                        <p class="text-left page-description">
                            Sur cette page, comparez en un coup d’œil les offres mobiles des principaux opérateurs. Utilisez les filtres pour affiner votre recherche. Trouvez rapidement l’offre qui correspond parfaitement à vos besoins et à votre budget.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('mobile-comparator-operators')
@endsection
@push('scripts')
    <script>
        window.addEventListener('filter-applied', event => {
            // TODO: might need to use this as a work arround to have a spinner on filter
        });
    </script>
@endpush
