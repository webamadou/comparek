<!-- Navbar -->
<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg bg-white navbar-light position-sticky top-0 shadow py-2">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="{{ config('app.url') }}">COMPAREK</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ config('app.url') }}">
                                <img src="./assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">

                </ul>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span class="nav-link-inner--text">Components</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="{{ route('list_operators') }}" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Liste des opérateurs</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Une liste des opérateurs telecom du Senegal</p>
                                    </div>
                                </a>
                                <a href="#" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-ui-04"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Comparateur de box & mobile</h6>
                                        <p class="description d-none d-md-inline-block mb-0">
                                            Consultez notre syste comparateur des services box & mobile
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Box & Mobile</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Liste des opérateurs</a>
                            <a href="#" class="dropdown-item">Comparateur de box & mobile</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
