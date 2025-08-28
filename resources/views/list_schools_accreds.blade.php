@extends('layouts.frontv1')

@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center school-bilboard">
                    <div class="col-sm-6 col-md-4 page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust19.svg') }}" alt="comparek" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-center">{{ __('schools.accredited_schools') }}</h1>
                    </div>
                    <div class="col-12 text-left px-3 page-description">
                        <p>
                            <h3><span class="bi bi-lightbulb"></span> Qu’est-ce qu’une école accréditée ?</h3>
                            <p>Une école accréditée est un établissement reconnu pour la qualité de son enseignement. Cela signifie que ses programmes ont été évalués et validés par un organisme officiel comme l’ANAQ-Sup (au Sénégal) ou le CAMES (à l’échelle africaine).</p>
                            <p>Cette accréditation garantit que l’école respecte des normes élevées en matière de formation, d’encadrement, d’infrastructures et de résultats.</p>
                            <p>Sur cette page, nous vous présentons uniquement les écoles et universités ayant au moins un programme accrédité, pour vous aider à faire un choix éclairé, fiable et reconnu.</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="p-0">
        <div class="container">
            <div class="row justify-content-between gy-4">
                <div class="col-lg-12 school-filter-wrapper sticky-element collapsed">
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
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-globe-americas"></span> {{ __('filters.foreign_students') }}</h3>
                                    <label for="accept_foreign" class="custom-checkbox">
                                        <input id="accept_foreign" type="checkbox" value="1">
                                        <span>{{ __('schools.accept_foreign_students') }}</span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-3 form-group">
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
                                <div class="col-sm-12 col-md-3 form-group">
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
                                        <select name="level" class="form-select school-filter">
                                            <option value=""> --- </option>
                                            @foreach(\App\Enums\ProgramLevelEnum::cases() as $level)
                                                <option value="{{ $level->value }}">{{ $level->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-textarea"></span> {{__('filters.domains')}}</h3>
                                    <div class="custom-checkbox-group">
                                        <select name="domain" class="form-select school-filter">
                                            <option value=""> --- </option>
                                            @foreach($domains as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 form-group">
                                    <h3><span class="bi bi-translate"></span> {{ __('filters.languages') }}</h3>
                                    <div class="d-flex">
                                        @foreach(\App\Enums\LanguageEnum::cases() as $lang)
                                            <div class="form-check">
                                                <input class="form-check-input school-filter" type="radio" name="language" id="{{ "lang{$lang->value}" }}" value="{{ $lang->value }}">
                                                <label class="form-check-label" for="{{ "lang{$lang->value}" }}">{{ $lang->value }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 form-group">
                                    <h3><span class="bi bi-list"></span> {{__('filters.modality')}}</h3>
                                    <div class="custom-checkbox-group">
                                        <select name="modalite" class="form-select school-filter">
                                            <option value=""> --- </option>
                                            @foreach(\App\Enums\ProgramModalityEnum::cases() as $modalite)
                                                <option value="{{ $modalite->value }}">{{ $modalite->value }}</option>
                                            @endforeach
                                        </select>
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
                       {{-- <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">3</div>--}}
                    </div>
                </div>
                <div id="schoolResults" class="px-1">
                    @include('partials.schools-list-accreds', ['schools' => $schools, 'accreditations' => $accreditations])
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
                    let level = $('*[name="level"]').val();
                    let domain = $('*[name="domain"]').val();
                    let modalite = $('*[name="modalite"]').val();

                    let foreign = $('#accept_foreign:checked').val();
                    let is_private = $('*[name="is_private"]:checked').val();
                    let language = $('*[name="language"]:checked').val();
                    let double_diplomes = $('#double_diplomes:checked').val();
                    let internership = $('#has_internership:checked').val();

                    let accreds = [];

                    $('.accred-filter:checked').each(function () {
                        accreds.push($(this).val());
                    });

                    $.ajax({
                        url: '/accredited_ecoles/ajax',
                        method: 'GET',
                        data: {
                            city: city,
                            level: level,
                            domain: domain,
                            modalite: modalite,
                            foreign: foreign,
                            language: language,
                            double_diplomes: double_diplomes,
                            internership: internership,
                            is_private: is_private,
                            'accreditations[]': accreds
                        },
                        success: function (data) {
                            $('#schoolResults').html(data);
                        },
                        error: function () {
                            alert('Erreur lors du chargement des écoles.');
                        }
                    });
                    $('#spinner').removeClass('active');
                }

                // Object to store manual overrides
                const manualOverrides = new WeakMap();

                function handleSticky() {
                    $('.sticky-element').each(function() {
                        // If this element has a manual override, skip the sticky logic
                        if (manualOverrides.get(this)) return;

                        const $el = $(this);
                        const top = parseInt($el.css('top')) || 0; // get the top offset of sticky
                        const elOffset = $el.offset().top; // element's top relative to document
                        const scrollTop = $(window).scrollTop();

                        if (scrollTop + top >= elOffset) {
                            if (!$el.hasClass('collapsed')) {
                                $el.addClass('collapsed');
                            }
                        }/*  else {
                            $el.removeClass('collapsed');
                        } */
                    });
                }

                $('.school-filter').on('change', fetchSchools);
                $('.accred-filter').on('change', fetchSchools);
                $('#double_diplomes').on('change', fetchSchools);
                $('#has_internership').on('change', fetchSchools);

                /* // Initial check
                handleSticky();

                // Check on scroll
                $(window).on('scroll', handleSticky);

                // Optional: also check on resize
                $(window).on('resize', handleSticky); */

            });

            /* $('.school-row-wrapper').click(function() {
                var firstLink = $(this).find('a').first();
                if (firstLink.length > 0) {
                    var href = firstLink.attr('href');
                    if (href) {
                        window.location.href = href;
                    }
                }
            }); */
        </script>
    @endpush

@endsection
