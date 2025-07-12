@extends('layouts.frontv1')

@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 page-bilboard-text">
                        <h1 class="heading-title">Comparek Score </h1>
                        <div class="page-description">
                            <p class="text-left">
                                Le Comparek Score est une note globale — de 0 à 100 — conçue pour vous aider à évaluer et comparer rapidement les offres mobiles et internet des différents opérateurs. Plutôt que de vous perdre dans une multitude de forfaits et d’options techniques, Comparek condense chaque offre en un indice unique, fondé sur des critères objectifs et pondérés selon les priorités des utilisateurs.
                            </p>
                            <h2>Comment le score est-il calculé ?</h2>
                            <h3>1.	Identification des critères clés</h3>
                            <ul>
                                <li>Prix : rapport qualité/prix</li>
                                <li>Services inclus : qualité des services inclus</li>
                                <li>Débit/technologie : 3G, 4G, 5G et vitesse garantie</li>
                                <li>Couverture réseau : fiabilité selon les régions</li>
                                <li>Service après-vente : disponibilité du support et qualité de l’assistance</li>
                            </ul>
                            <h3>2.	Pondération personnalisée</h3>
                            Chaque critère reçoit un poids (par exemple 30 % pour le prix, 25 % pour les services, etc.), déterminé à la fois par des études de marché et par les retours d’utilisateurs. Vous avez également la possibilité de réajuster ces pondérations selon vos besoins (par exemple : plus de data ou un budget serré).
                            <h3>3.	Normalisation et agrégation</h3>
                            Les données brutes (prix, volume, tests de débit, indices de couverture) sont d’abord converties sur une échelle commune (0–10). Le score final est ensuite obtenu en agrégeant ces sous-scores pondérés, afin de refléter une évaluation globale et équilibrée.
                            <h2>Interpréter le Comparek Score</h2>
                            <ul>
                                <li><strong class="score score-a">A</strong> (Excellent) : l’offre se distingue par un très bon rapport qualité/prix et une couverture solide.</li>
                                <li><strong class="score score-b">B</strong> (Très bon) : l’offre reste compétitive, avec quelques compromis sur un ou deux critères.</li>
                                <li><strong class="score score-c">C</strong> (Moyen) : l’offre peut convenir à un usage spécifique, mais présente des limitations (volumes réduits, couverture partielle).</li>
                                <li><strong class="score score-d">D</strong> (Acceptable) : l’offre est acceptable pour des besoins très ponctuels très limités.</li>
                                <li><strong class="score score-e">E</strong> (Faible) : l’offre n’est pas recommandée.</li>
                            </ul>
                            <h3>Pourquoi faire confiance au Comparek Score ?</h3>
                            <ul>
                                <li>Objectivité : basé sur des données actualisées et des méthodes statistiques rigoureuses.</li>
                                <li>Transparence : nous publions la liste des critères et leurs pondérations, afin que vous compreniez exactement ce qui influence chaque note.</li>
                                <li>Mise à jour continue : les scores sont recalculés régulièrement pour intégrer les nouveaux forfaits, les évolutions de réseau et vos retours.</li>
                            </ul>
                            <p>Avec ce système, vous bénéficiez d’un accompagnement clair et fiable pour choisir l’offre télécom qui correspond le mieux à vos exigences. N’hésitez pas à explorer les filtres, adapter les pondérations et consulter les détails de chaque critère pour affiner votre sélection !</p>
                        </div>
                        <div class="read-more-wrapper">
                            <a href="#" class="read-more">
                                <span class="bi bi-arrows-expand">{{ __('commons.read-more') }}</span>
                                <span class="bi bi-arrows-collapse closed">{{ __('commons.close') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-md-block page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust13.svg') }}" alt="comparek" style="width: 20vw;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('telecom-comparek-score')
@endsection
@push('scripts')
    <script>
        $('.read-more').on('click', function(e) {
            $('.page-description').toggleClass('active');
            $('.read-more .bi').toggleClass('closed');
        })
    </script>
@endpush
