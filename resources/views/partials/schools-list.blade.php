@foreach($schools as $school)
    <div class="row mb-0 school-row p-0">
        <div class="school-logo col-sm-2 col-md-2">
            @if($school->images)
                <img src="{{ Storage::disk('public')->url($school->images->path) }}" width="100%" alt="{{ $school->images->path }}">
            @else
                no image
            @endif
        </div>
        <div class="school-text col-sm-10 col-md-10">
            <h3 class="card-title">{{ $school->name }}</h3>
            {!! $school->description !!}
        </div>
    </div>
@endforeach
