@extends('layouts.frontv1')

@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center school-bilboard">
                    <div class="col-md-8">
                        <h1 class="text-center">{{ __('schools.comparison_schools') }}</h1>
                    </div>
                    <div class="col-sm-6 col-md-4 page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust21.svg') }}" alt="comparek" class="img-fluid">
                    </div>
                    <div class="col-12 text-left px-3 page-description">
                        <p>
                            <h3><span class="bi bi-lightbulb"></span>Comparez les écoles, en toute simplicité</h3>
                            <p>Choisir une école ou une université est une décision importante. Grâce à notre outil de comparaison, vous pouvez <strong>sélectionner deux établissements</strong> et voir instantanément leurs principales caractéristiques côte à côte : accréditations, programmes, frais de scolarité, durée des études, langues d’enseignement, et bien plus encore.</p>
                            <p>Comparek vous permet de visualiser les différences et similitudes entre les écoles, afin de vous aider à faire un choix éclairé. Que vous soyez étudiant sénégalais ou étranger, ou parent, notre plateforme vous offre une vue d’ensemble claire et objective des options disponibles.</p>

                            <p>Pour commencer, sélectionnez simplement deux écoles dans les menus ci-dessous.
                            Comparek vous aide à <strong>voir clair, comparer et mieux choisir.</strong></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="p-0">
        <div class="container">
            <div class="row justify-content-between gy-4">
                <div id="schoolComparison" class="px-1">
                    @livewire('school-comparison')
                </div>
                <div style="height: 300px">&nbsp;</div>
            </div>
        </div>
    </section>
@endsection
