<header class="header header-sticky p-0 mb-4">
    <div class="container-fluid border-bottom px-4">
        <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;"></button>
        <ul class="header-nav">
            <li class="nav-item py-1">
                <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md">
                    <svg width="150" height="150" viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="75" cy="75" r="75" fill="#E3F2FD"/>
                        <circle cx="75" cy="60" r="30" fill="#90CAF9"/>
                        <rect x="30" y="95" width="90" height="40" rx="20" fill="#90CAF9"/>
                    </svg>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                        <div class="fw-semibold">Parametres</div>
                    </div>
                    <a class="dropdown-item" href="#">
                        Profil
                    </a>
                    <a class="dropdown-item" href="#">
                        Compta<span class="badge badge-sm bg-secondary ms-2">42</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">

                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item"><a href="#">Accueil</a>
                </li>
                <li class="breadcrumb-item active"><span>Backoffice</span>
                </li>
            </ol>
        </nav>
    </div>
</header>
