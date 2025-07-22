@foreach($programs as $program)
    <div class="row mb-0 school-row p-0 school-row-wrapper">
        <div class="school-logo col-sm-2 col-md-2">
            @if($school->images)
                <a href="{{ route('view_school', $school) }}">
                    <img src="{{ Storage::disk('public')->url($school->images->path) }}" width="100%" alt="{{ $school->images->path }}">
                </a>
            @endif
        </div>
        <div class="school-text col-sm-10 col-md-10 row">
            <div class="row m-0 p-0">
                <div class="col-12"><h3 class="card-title">{{ $program->name }}</h3></div>
                <div class="col-sm-6 col-md-5">
                    <ul class="program-list">
                        <li><strong><span class="bi bi-stack"></span> {{__('schools.domain') }}</strong> : {{ $program->domain?->name }}</li>
                        <li><strong><span class="bi bi-flag-fill"></span> {{__('schools.level') }}</strong> : {{ $program->level }}</li>
                        <li><strong><span class="bi bi-clock-fill"></span> {{__('schools.duration') }}</strong> : {{ $program->duration_years }}</li>
                        <li><strong><span class="bi bi-book-fill"></span> {{__('schools.modality') }}</strong> : {{ $program->modality }}</li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-7 program-tuition">
                    <h3 class="card-text">{{ $program->tuition_fee . ' ' . $program->tuition_currency }}</h3>
                    <p class="card-text">{{ $program->tuition_description }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
