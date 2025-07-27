@foreach($schools as $school)
    @php
        $accreditations = $school
        ->programs
        ->map(
            fn($p) => $p->accreditationBodies->map(
                fn($a) => $a->name)
            )
            ->flatten()
            ->unique()
            ->toArray();
    @endphp
    <div class="row mb-0 school-row p-0 school-row-wrapper">
        <div class="school-logo col-sm-2 col-md-2">
            @if($school->images && !empty($school->images->path) && Storage::disk('public')->exists($school->images->path))
                <a href="{{ route('view_school', $school) }}">
                    <img src="{{ Storage::disk('public')->url($school->images->path) }}" width="100%" alt="{{ $school->images->path }}">
                </a>
            @else
                <a href="{{ route('view_school', $school->slug) }}">
                    <img src="{{ asset('frontv1/img/illustration/default-img.png') }}" width="100%" alt="Default school image">
                </a>
            @endif
        </div>
        <div class="school-text col-sm-10 col-md-10">
            <h3 class="card-title">{{ $school->name }}</h3>
            {!! $school->description !!}
            <ul class="accreditation-list">
                @foreach($accreditations as $accred)
                    <li> <span class="badge"> 
                        <span class="bi bi-award-fill"></span>
                        {{ $accred }}
                    </span> </li>
                @endforeach
            </ul>
        </div>
    </div>
@endforeach
