@foreach($programs as $program)
    <div class="row mb-0 school-row p-0 school-row-wrapper">
        <div class="school-logo col-sm-2 col-md-2">
            <a href="{{ route('view_school', $program->school) }}" title="{{ $program->school->name }}">
            @if($program->school->images)
                <img src="{{ Storage::disk('public')->url($program->school->images->path) }}" width="100%" alt="{{ $program->school->name }}">
            @else
                <img src="{{ asset('frontv1/img/illustration/default-img.png') }}" width="100%" alt="{{ $program->school->name }}">
            @endif
            </a>
        </div>
        <div class="school-text col-sm-10 col-md-10 row">
            <div class="row m-0 p-0">
                <div class="col-12">
                    <h3 class="card-title">
                        <a href="{{ route('view_program', $program) }}" title="{{ $program->name }}">{{ $program->name }}</a>
                    </h3></div>
                <div class="col-sm-6 col-md-5">
                    <ul class="program-list">
                        <li> <strong><span class="bi bi-stack"></span> {{__('schools.domains') }}</strong> : {{ $program->domains->pluck('name')->implode(',') }} </li>
                        <li> <strong><span class="bi bi-flag-fill"></span> {{__('schools.level') }}</strong> : {{ $program->level }} </li>
                        <li> <strong><span class="bi bi-clock-fill"></span> {{__('schools.duration') }}</strong> : {{ $program->duration_years . ' ' . __('commons.years') }} </li>
                        <li> <strong><span class="bi bi-book-fill"></span> {{__('schools.modality') }}</strong> : {{ $program->modality }} </li>
                        @if (! $program->accreditationBodies->pluck('name')->isEmpty())
                            <li> <strong><span class="bi bi-award-fill"></span> {{__('schools.accreditations') }}</strong> : {{ $program->accreditationBodies->pluck('name')->implode(', ') }} </li>
                        @else
                            <li> <strong><span class="bi bi-award-fill"></span> {{__('schools.accreditations') }}</strong> : {{ __('schools.no_accreditations') }} </li>
                        @endif
                    </ul>
                </div>
                <div class="col-sm-6 col-md-7 program-tuition">
                    <div>
                        @if ($program->registration_fee && !$program->tuition_fee)
                        <strong><span class="bi bi-currency-exchange"></span> {{__('schools.registration_fee') }}</strong> :
                        <h3>{{ number_format($program->registration_fee, 0, ',', ' ') . ' ' . $program->tuition_currency }}</h3>
                        @elseif ($program->registration_fee && $program->tuition_fee)
                        <strong><span class="bi bi-currency-exchange"></span> {{__('schools.registration_fee') }}</strong> :
                        <h3>{{ number_format($program->registration_fee, 0, ',', ' ') . ' ' . $program->tuition_currency }}</h3>
                        <h4>{{ number_format($program->tuition_fee, 0, ',', ' ') . ' ' . $program->tuition_currency }} {{ __('schools.tuition_fee') }}</h4>
                        @elseif ($program->tuition_fee)
                        <strong><span class="bi bi-currency-exchange"></span> {{__('schools.tuition_fee') }}</strong> :
                        <h3>{{ number_format($program->tuition_fee, 0, ',', ' ') . ' ' . $program->tuition_currency }}</h3>
                        @endif
                    </div>
                    <a href="{{ route('view_program', $program) }}" class="btn btn-primary btn-comparek">{{ __('commons.read_more') }} <span class="bi bi-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </div>
@endforeach
