@extends('layouts.frontv1')

@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center school-bilboard">
                    <div class="col-md-8">
                        <h1>{{ __('schools.schools_university') }}</h1>
                    </div>
                    <div class="col-sm-6 col-md-4 page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust17.svg') }}" alt="comparek" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="p-0">
        <div class="container">
            <div class="row justify-content-between gy-4">
                <div class="col-lg-12 school-filter-wrapper sticky-element">
                    <span class="collapse-trigger bi bi-chevron-double-down"></span>
                    <div id="spinner" wire:loading class="justify-content-center"><span class="loader"></span></div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#schools-filters" type="button" role="tab" aria-controls="schools-filters" aria-selected="true">Filtrer par établissement</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#programs-filter" type="button" role="tab" aria-controls="programs-filter" aria-selected="false">Filtrer par programmes</button>
                        </li>
                    </ul>

                    <small>
                        <a href="#" id="reset-filter" data-target="filterTabsContent">
                            <span class="bi bi-arrow-clockwise"></span> {{ __('filters.reset') }}
                        </a>
                    </small>
                    <div class="tab-content my-1 mt-4 " id="filterTabsContent">
                        <div class="tab-pane fade show active" id="schools-filters" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-geo-alt-fill"></span> {{__('filters.cities')}}</h3>
                                    <div class="custom-checkbox-group">
                                        <select name="city" class="form-select school-filter">
                                            <option value=""> --- </option>
                                            @foreach(\App\Enums\SenegalCityEnum::cases() as $city)
                                                <option value="{{ $city->value }}">{{ $city->label() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 form-group">
                                    <h3><span class="bi bi-mortarboard-fill"></span> {{ __('filters.school_type') }}</h3>
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input school-filter" type="radio" name="is_private" id="is_private1" value="1">
                                            <label class="form-check-label" for="is_private1">{{ __('schools.is_a_private') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input school-filter" type="radio" name="is_private" id="is_private2" value="2">
                                            <label class="form-check-label" for="is_private2">{{ __('schools.is_a_public') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 form-group">
                                    <h3><span class="bi bi-patch-check-fill"></span> {{ __('filters.certification') }}</h3>
                                    <div class="d-flex justify-content-between">
                                        <label for="accred3" class="custom-checkbox">
                                            <input class="accred-filter" id="accred3" type="checkbox" name="accreditations[]"
                                                   value="3">
                                            <span>ISO 9001</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 row filter-bottom-row">
                                    <div class="col-sm-12 col-md-3 mt-3 form-group">
                                        <h3><span class="bi bi-award-fill"></span> {{ __('filters.accreditations_national') }}</h3>
                                        <div class="d-flex justify-content-between">
                                            <label for="accred1" class="custom-checkbox">
                                                <input class="accred-filter" id="accred1" type="checkbox" name="accreditations[]"
                                                       value="1">
                                                <span>ANAQ-Sup</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-3 form-group">
                                        <h3><span class="bi bi-award-fill"></span> {{ __('filters.accreditations_regional') }}</h3>
                                        <div class="d-flex justify-content-between">
                                            <label for="accred2" class="custom-checkbox">
                                                <input class="accred-filter" id="accred2" type="checkbox" name="accreditations[]"
                                                       value="2">
                                                <span>CAMES</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mt-3 form-group">
                                        <h3><span class="bi bi-award-fill"></span> {{ __('filters.accreditations_international') }}</h3>
                                        <div class="d-flex justify-content-between">
                                            @foreach($accreditations as $id => $name)
                                                <label for="{{ "accred{$id}" }}" class="custom-checkbox">
                                                    <input class="accred-filter" id="{{ "accred{$id}" }}" type="checkbox" name="accreditations[]"
                                                           value="{{ $id }}">
                                                    <span>{{ $name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="programs-filter" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-bar-chart-steps"></span> {{__('filters.levels')}}</h3>
                                    <div class="custom-checkbox-group">
                                        <select name="level" class="form-select program-filter">
                                            <option value=""> --- </option>
                                            @foreach(\App\Enums\ProgramLevelEnum::cases() as $level)
                                                <option value="{{ $level->value }}">{{ $level->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-bar-chart-steps"></span> {{__('schools.super_domain')}}</h3>
                                    <select id="super_domain_id" name="super_domain_id" class="form-select program-filter">
                                        <option value="">{{ __('schools.select_super_domain') }}</option>
                                        @foreach($superDomains as $id => $name)
                                            <option value="{{ $id }}" @selected(request('super_domain_id') == $id)>{{ __('schools.' . $name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Domaine (2e dropdown caché par défaut) --}}
                                <div class="col-sm-12 col-md-3 form-group" id="domain_wrapper" style="{{ $domains->isEmpty() ? 'display:none' : '' }}">
                                    <h3><span class="bi bi-bar-chart-steps"></span> {{__('schools.domains')}}</h3>
                                    <select id="domain_id" name="domain" class="form-select program-filter">
                                        <option value="">{{ __('schools.select_domain') }}</option>
                                        @foreach($domains as $id => $name)
                                            <option value="{{ $id }}" @selected(request('domain') == $id)>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-2 form-group">
                                    <h3><span class="bi bi-patch-check-fill"></span> {{ __('filters.certification') }}</h3>
                                    <div class="d-flex justify-content-between">
                                        <label for="p-accred3" class="custom-checkbox">
                                            <input class="p-accred-filter" id="p-accred3" type="checkbox" name="paccreditations[]"
                                                   value="3">
                                            <span>ISO 9001</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 row filter-bottom-row">
                                    <div class="col-sm-12 col-md-3 mt-3 form-group">
                                        <h3><span class="bi bi-award-fill"></span> {{ __('filters.accreditations_national') }}</h3>
                                        <div class="d-flex justify-content-between">
                                            <label for="p-accred1" class="custom-checkbox">
                                                <input class="p-accred-filter" id="p-accred1" type="checkbox" name="paccreditations[]"
                                                       value="1">
                                                <span>ANAQ-Sup</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-3 form-group">
                                        <h3><span class="bi bi-award-fill"></span> {{ __('filters.accreditations_regional') }}</h3>
                                        <div class="d-flex justify-content-between">
                                            <label for="p-accred2" class="custom-checkbox">
                                                <input class="p-accred-filter" id="p-accred2" type="checkbox" name="paccreditations[]"
                                                       value="2">
                                                <span>CAMES</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mt-3 form-group">
                                        <h3><span class="bi bi-award-fill"></span> {{ __('filters.accreditations_international') }}</h3>
                                        <div class="d-flex justify-content-between">
                                            @foreach($accreditations as $id => $name)
                                                <label for="{{ "p-accred{$id}" }}" class="custom-checkbox">
                                                    <input class="p-accred-filter" id="{{ "p-accred{$id}" }}" type="checkbox" name="paccreditations[]"
                                                           value="{{ $id }}">
                                                    <span>{{ $name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-substack"></span> {{ __('filters.double_degree_exchange') }}</h3>
                                    <label for="double_diplomes" class="custom-checkbox">
                                        <input id="double_diplomes" type="checkbox" value="1">
                                        <span>{{ __('schools.double_diplomes_students') }}</span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-bookmarks-fill"></span> {{ __('filters.has_internship') }}</h3>
                                    <label for="has_internership" class="custom-checkbox">
                                        <input id="has_internership" type="checkbox" value="1">
                                        <span>{{ __('schools.has_internership_students') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="schoolResults" class="px-1">
                    @include('partials.schools-list', ['schools' => $schools])
                </div>
                <div id="programResults" class="px-1">
                    @include('partials.school-programs-list', ['programs' => $programs])
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $(document).ready(function () {
                function fetchSchools() {
                    $('#spinner').addClass('active');

                    let city = $('*[name="city"]').val();
                    let is_private = $('*[name="is_private"]:checked').val();

                    let accreds = [];
                    $('.accred-filter:checked').each(function () {
                        accreds.push($(this).val());
                    });

                    $.ajax({
                        url: '/ecoles/ajax',
                        method: 'GET',
                        data: {
                            city: city,
                            is_private: is_private,
                            'accreditations[]': accreds
                        },
                        success: function (data) {
                            $('#schoolResults').html(data);
                            if (window.innerWidth <= 768) {
                                $('.school-filter-wrapper').addClass('collapsed');
                            }
                        },
                        error: function () {
                            alert('Erreur lors du chargement des écoles.');
                        }
                    });
                    $('#spinner').removeClass('active');
                }

                function fetchPrograms() {
                    $('#spinner').addClass('active');

                    let level = $('*[name="level"]').val();
                    let domain = $('*[name="domain"]').val();
                    let modalite = $('*[name="modalite"]').val();

                    let language = $('*[name="language"]:checked').val();
                    let double_diplomes = $('#double_diplomes:checked').val();
                    let internership = $('#has_internership:checked').val();

                    let accreds = [];

                    $('.p-accred-filter:checked').each(function () {
                        accreds.push($(this).val());
                    });

                    $.ajax({
                        url: '/ecoles/ajax',
                        method: 'GET',
                        data: {
                            type: 'program',
                            level: level,
                            domain: domain,
                            modalite: modalite,
                            language: language,
                            double_diplomes: double_diplomes,
                            internership: internership,
                            'paccreditations[]': accreds
                        },
                        success: function (data) {
                            $('#programResults').html(data);
                            if (window.innerWidth <= 768) {
                                $('.school-filter-wrapper').addClass('collapsed');
                            }
                        },
                        error: function () {
                            alert('Erreur lors du chargement des écoles.');
                        }
                    });
                    $('#spinner').removeClass('active');
                }

                $('.school-filter').on('change', fetchSchools);
                $('.accred-filter').on('change', fetchSchools);

                $('.p-accred-filter').on('change', fetchPrograms);
                $('.program-filter').on('change', fetchPrograms);
                $('#double_diplomes').on('change', fetchPrograms);
                $('#has_internership').on('change', fetchPrograms);

                // Fetch domains when super_domain_id changes
                const $superSelect   = $('#super_domain_id');
                const $domainWrapper = $('#domain_wrapper');
                const $domainSelect  = $('#domain_id');

                $superSelect.on('change', function() {
                    let superId = $(this).val();
                    $('#spinner').addClass('active');

                    // RESET domain select
                    $domainSelect.html('<option value="">{{ __("schools.select_domain") }}</option>');

                    if (!superId) {
                        $domainWrapper.hide();
                        return;
                    }

                    $.ajax({
                        url: "{{ route('program-domains.ajax') }}",
                        method: 'GET',
                        data: { super_domain_id: superId },
                        success: function (res) {
                            if (res.data && res.data.length > 0) {
                                $.each(res.data, function (i, item) {
                                    $domainSelect.append(
                                        $('<option>', { value: item.id, text: item.name })
                                    );
                                });
                                $domainWrapper.show();
                            } else {
                                $domainWrapper.hide();
                            }

                            $('#spinner').removeClass('active');
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                            $domainWrapper.hide();

                            $('#spinner').removeClass('active');
                        }
                    });
                });
            }); // end of document ready

            // Sync tab visibility with results
            $('#myTab button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                const target = $(e.target).attr('data-bs-target');
                if (target === '#schools-filters') {
                    $('#schoolResults').show();
                    $('#programResults').hide();
                } else if (target === '#programs-filter') {
                    $('#schoolResults').hide();
                    $('#programResults').show();
                }
            });

            // Hide programResults by default (since schools tab is active)
            $('#programResults').hide();
        </script>
    @endpush

@endsection
