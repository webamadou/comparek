<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <img src="{{asset('assets/logo/CompareK.png')}}" alt="comparek" style="width: 100%; height: auto;">
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-wifi-check"></span> &nbsp;
                </svg> Opérateurs télécom</a>
            <ul class="compact">
                <li class="nav-item"><a class="nav-link" href="{{ route('telecom_operator.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Opérateurs télécom</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('telecom_service_type.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Type de services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('telecom_offer.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Les Offres </a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('telecom_offer_feature.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Params des Offres </a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('score_criteria.index')}}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Critères des scores </a></li>
            </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-school"></span> &nbsp;
                </svg> Écoles</a>
            <ul class="compact">
                <li class="nav-item"><a class="nav-link" href="{{ route('schools.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Gest. Écoles</a></li>
                <li class="nav-item"> - </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('school_programs.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Gest. des Programmes</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('program_features.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span>Options Programmes</a>
                </li>
            </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-school"></span> &nbsp;
                </svg> Articles</a>
            <ul class="compact">
                <li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Gest. Articles</a></li>
                <li class="nav-item"> - </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Gest. Catégories</a></li>
            </ul>
        </li>
        <!--<li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-alphabetical-variant"></span> &nbsp;
                </svg> ComparekScore</a>
            <ul class="compact">

                <li class="nav-item"><a class="nav-link" href="{{route('score_value.index')}}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Gest. des scores</a></li>
                < !-- <li class="nav-item"><a class="nav-link" href="buttons/dropdowns.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Dropdowns</a></li>
                <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/components/loading-buttons/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Loading Buttons
                        <svg class="icon icon-sm ms-2">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li> --
            </ul>
        </li>-->
        <!-- <li class="nav-item"><a class="nav-link" href="charts.html">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                </svg> Charts</a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                </svg> Forms</a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link" href="forms/form-control.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Form Control</a></li>
                <li class="nav-item"><a class="nav-link" href="forms/select.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Select</a></li>
                <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/multi-select/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Multi Select
                        <svg class="icon icon-sm ms-2">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="forms/checks-radios.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Checks and radios</a></li>
                <li class="nav-item"><a class="nav-link" href="forms/range.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Range</a></li>
                <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/range-slider/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Range Slider
                        <svg class="icon icon-sm ms-2">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="forms/input-group.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Input group</a></li>
                <li class="nav-item"><a class="nav-link" href="forms/floating-labels.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Floating labels</a></li>
                <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/date-picker/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Date Picker
                        <svg class="icon icon-sm ms-2">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/date-range-picker/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Date Range Picker<span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/rating/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Rating
                        <svg class="icon icon-sm ms-2">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/time-picker/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Time Picker
                        <svg class="icon icon-sm ms-2">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="forms/layout.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Layout</a></li>
                <li class="nav-item"><a class="nav-link" href="forms/validation.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Validation</a></li>
            </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                </svg> Icons</a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-free.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons<span class="badge badge-sm bg-success ms-auto">Free</span></a></li>
                <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-brand.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons - Brand</a></li>
                <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-flag.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons - Flag</a></li>
            </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                </svg> Notifications</a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link" href="notifications/alerts.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Alerts</a></li>
                <li class="nav-item"><a class="nav-link" href="notifications/badge.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Badge</a></li>
                <li class="nav-item"><a class="nav-link" href="notifications/modals.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Modals</a></li>
                <li class="nav-item"><a class="nav-link" href="notifications/toasts.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Toasts</a></li>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="widgets.html">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                </svg> Widgets<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-divider"></li>
        <li class="nav-title">News</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                </svg> Categories</a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                        <svg class="nav-icon">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg> Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                        <svg class="nav-icon">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg> Register</a></li>
                <li class="nav-item"><a class="nav-link" href="404.html" target="_top">
                        <svg class="nav-icon">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg> Error 404</a></li>
                <li class="nav-item"><a class="nav-link" href="500.html" target="_top">
                        <svg class="nav-icon">
                            <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                        </svg> Error 500</a></li>
            </ul>
        </li>
        <li class="nav-item mt-auto"><a class="nav-link" href="https://coreui.io/docs/templates/installation/" target="_blank">
                <svg class="nav-icon">
                    <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                </svg> Docs</a></li>
        <li class="nav-item"><a class="nav-link text-primary fw-semibold" href="https://coreui.io/product/bootstrap-dashboard-template/" target="_top">
                <svg class="nav-icon text-primary">
                    <span class="iconify" data-icon="mdi-dots-grid"></span> &nbsp;
                </svg> Try CoreUI PRO</a>
        </li> -->
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
