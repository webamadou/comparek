@extends('layouts.frontv1')

@section('title', $school->meta_title ?? $school->name)
@section('meta_description', $school->meta_description)
@section('meta_keywords', $school->seo_keywords)
<x-seo-meta :page="$page ?? null" />
@section('content')
    <div class="page-title">
        <div class="heading pb-0">
            <div class="container">
                <div class="row d-flex justify-content-center school-bilboard">
                    <div class="col-md-8">
                        <h1>{{ $school->name }}</h1>
                    </div>
                    <div class="col-sm-6 col-md-4 page-bilboard-img">
                        <img src="{{ asset('frontv1/img/illustration/illust18.svg') }}" alt="comparek"
                             class="img-fluid">
                    </div>
                    <div class="col-md-12 page-description">
                        <p class="card-text">{!! $school->full_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="p-0">
        <div class="container">
            <h1>{{ __('schools.programs') }}</h1>
            <div class="row justify-content-between gy-4">
                <div class="col-lg-12 school-filter-wrapper sticky-element collapsed">
                    <span class="collapse-trigger bi bi-chevron-double-down"></span>
                    <h3>
                        {{ __('filters.filter') }}
                        <small>
                            <a href="#" id="reset-filter" data-target="filterTabsContent">
                                <span class="bi bi-arrow-clockwise"></span> {{ __('filters.reset') }}
                            </a>
                        </small>
                    </h3>
                    <div id="spinner" wire:loading class="justify-content-center"><span class="loader"></span></div>
                    <div class="" id="filterTabsContent">
                        <div class="" id="programs-filter" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="row">
                                <div class="col-sm-12 col-md-2 form-group">
                                    <h3><span class="bi bi-bar-chart-steps"></span> {{__('filters.levels')}}</h3>
                                    <div class="custom-checkbox-group">
                                        <select name="level" class="form-select school-filter">
                                            <option value=""> ---</option>
                                            @foreach(\App\Enums\ProgramLevelEnum::cases() as $level)
                                                <option value="{{ $level->value }}">{{ $level->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 form-group">
                                    <h3><span class="bi bi-textarea"></span> {{__('filters.domains')}}</h3>
                                    <div class="custom-checkbox-group">
                                        <select name="domain" class="form-select school-filter">
                                            <option value=""> ---</option>
                                            @foreach($supDomains as $supDomain)
                                            <optgroup label="{{ __('schools.' . $supDomain->name) }}">
                                                @foreach($supDomain->domains as $domain)
                                                    <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 form-group">
                                    <h3><span class="bi bi-translate"></span> {{ __('filters.languages') }}</h3>
                                    <div class="d-flex">
                                        @foreach(\App\Enums\LanguageEnum::cases() as $lang)
                                            <div class="form-check">
                                                <input class="form-check-input school-filter" type="radio"
                                                       name="language" id="{{ "lang{$lang->value}" }}"
                                                       value="{{ $lang->value }}">
                                                <label class="form-check-label"
                                                       for="{{ "lang{$lang->value}" }}">{{ $lang->value }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-list"></span> {{__('filters.modality')}}</h3>
                                    <div class="custom-checkbox-group">
                                        <select name="modalite" class="form-select school-filter">
                                            <option value=""> ---</option>
                                            @foreach(\App\Enums\ProgramModalityEnum::cases() as $modalite)
                                                <option value="{{ $modalite->value }}">{{ $modalite->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-substack"></span> {{ __('filters.double_degree_exchange') }}
                                    </h3>
                                    <label for="double_diplomes" class="custom-checkbox">
                                        <input id="double_diplomes" type="checkbox" value="1">
                                        <span>{{ __('schools.double_diplomes') }}</span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-3 form-group">
                                    <h3><span class="bi bi-bookmarks-fill"></span> {{ __('filters.has_internship') }}
                                    </h3>
                                    <label for="has_internership" class="custom-checkbox">
                                        <input id="has_internership" type="checkbox" value="1">
                                        <span>{{ __('schools.has_internership') }}</span>
                                    </label>
                                </div>
                                <div class="col-6">&nbsp;</div>
                                <div class="filter-bottom-row row col-12 mt-2">
                                    <div class="col-sm-12 col-md-3 mt-3 form-group">
                                        <h3><span
                                                class="bi bi-award-fill"></span> {{ __('filters.accreditations_national') }}
                                        </h3>
                                        <div class="d-flex justify-content-between">
                                            <label for="accred1" class="custom-checkbox">
                                                <input class="accred-filter" id="accred1" type="checkbox"
                                                       name="accreditations[]"
                                                       value="1">
                                                <span>ANAQ-Sup</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-3 form-group">
                                        <h3><span
                                                class="bi bi-award-fill"></span> {{ __('filters.accreditations_regional') }}
                                        </h3>
                                        <div class="d-flex justify-content-between">
                                            <label for="accred2" class="custom-checkbox">
                                                <input class="accred-filter" id="accred2" type="checkbox"
                                                       name="accreditations[]"
                                                       value="2">
                                                <span>CAMES</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mt-3 form-group">
                                        <h3><span
                                                class="bi bi-award-fill"></span> {{ __('filters.accreditations_international') }}
                                        </h3>
                                        <div class="d-flex justify-content-between">
                                            @foreach($accreditations as $id => $name)
                                                <label for="{{ "accred{$id}" }}" class="custom-checkbox">
                                                    <input class="accred-filter" id="{{ "accred{$id}" }}" type="checkbox"
                                                           name="accreditations[]"
                                                           value="{{ $id }}">
                                                    <span>{{ $name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="schoolResults" class="px-1">
                    @include('partials.school-programs-list', ['programs' => $programs, 'schools' => $school])
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function () {
                function fetchSchools() {
                    $('#spinner').addClass('active');

                    let level = $('*[name="level"]').val();
                    let domain = $('*[name="domain"]').val();
                    let modalite = $('*[name="modalite"]').val();

                    let language = $('*[name="language"]:checked').val();
                    let double_diplomes = $('#double_diplomes:checked').val();
                    let internership = $('#has_internership:checked').val();

                    let accreds = [];

                    $('.accred-filter:checked').each(function () {
                        accreds.push($(this).val());
                    });

                    $.ajax({
                        url: '/programs-filter/ajax',
                        method: 'GET',
                        data: {
                            schoolId: @json($school->id),
                            level: level,
                            domain,
                            modalite,
                            language,
                            double_diplomes,
                            internership,
                            accreditations: accreds
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

                $('.school-filter').on('change', fetchSchools);
                $('.accred-filter').on('change', fetchSchools);
                $('#double_diplomes').on('change', fetchSchools);
                $('#has_internership').on('change', fetchSchools);
            });

            /* $('.school-row-wrapper').click(function () {
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
