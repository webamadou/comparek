@foreach($programs as $program)
    <div class="row mb-0 school-row p-0 school-row-wrapper">
        <div class="school-logo col-sm-2 col-md-2">
            @if($program->school->images)
                <a href="{{ route('view_school', $program->school) }}" title="{{ $program->school->name }}">
                    <img src="{{ Storage::disk('public')->url($program->school->images->path) }}" width="100%" alt="{{ $program->school->images->path }}">
                </a>
            @endif
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
                        <li> <strong><span class="bi bi-clock-fill"></span> {{__('schools.duration') }}</strong> : {{ $program->duration_years }} </li>
                        <li> <strong><span class="bi bi-book-fill"></span> {{__('schools.modality') }}</strong> : {{ $program->modality }} </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-7 program-tuition">
                    <div>
                        <strong><span class="bi bi-currency-exchange"></span> {{__('schools.tuition') }}</strong> :
                        {!! $program->tuition_fee
                            ? '<h3>' . number_format($program->tuition_fee, 0, ',', ' ') . ' ' . $program->tuition_currency . '</h3>'
                            : '<p><small>' . __('schools.tuition_fee_not_available') . '</small></p>' !!}
                    </div>
                    <a href="{{ route('view_program', $program) }}" class="btn btn-primary btn-comparek">{{ __('commons.read_more') }} <span class="bi bi-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </div>
@endforeach
