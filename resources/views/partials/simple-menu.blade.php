<nav id="navmenu" class="navmenu">
    <ul>
        <li class="dropdown">
            <a href="{{ route('home') }}" class="active">
                <span><strong class="bi bi-bullseye"></strong> {{ __('commons.home') }}</span></a>
        </li>
        <li class="dropdown"><a href="#"><span><strong class="bi bi-wifi"></strong> Box & Mobile</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="{{ route('list_operators') }}">Liste des opérateurs</a></li>
                <li><a href="{{ route('telecom_comparison') }}">Comparateur d'offres internet</a></li>
                <li><a href="{{ route('telecom_pass_comparison') }}">Comparateur d'offres mobile</a></li>
                <li><a href="{{ route('telecom_scores') }}">Scores des offres</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span><strong class="bi bi-mortarboard-fill"></strong>  Écoles</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="{{ route('index_schools') }}">Grandes Écoles & Université</a></li>
                <li><a href="{{ route('accreds_schools') }}">Écoles accréditées</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span><strong class="bi bi-bank2"></strong> Banques</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#"> .... </a></li>
                <li><a href="#"> .... </a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#pre-footer"><span><strong class="bi bi-envelope-at-fill"></strong> Contact</span></a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>