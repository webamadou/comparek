@foreach($schools as $school)
    <div class="row mb-0 school-row p-0 school-row-wrapper">
        <div class="school-logo col-sm-2 col-md-2">
            @if($school->images && !empty($school->images->path) && Storage::disk('public')->exists($school->images->path))
                <a href="{{ route('view_school', $school) }}" title="{{ $school->name }}">
                    <img src="{{ Storage::disk('public')->url($school->images->path) }}" width="100%" alt="{{ $school->images->path }}">
                </a>
            @else
                <a href="{{ route('view_school', $school->slug) }}" title="{{ $school->name }}">
                    <img src="{{ asset('frontv1/img/illustration/default-img.png') }}" width="100%" alt="Default school image">
                </a>
            @endif
        </div>
        <div class="school-text col-sm-10 col-md-10">
            <h3 class="card-title"><a href="{{ route('view_school', $school) }}">{{ $school->name }}</a></h3>
            {!! $school->description !!}
        </div>
    </div>
@endforeach
