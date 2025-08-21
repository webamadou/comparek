<div class="container py-4">
    <h2>{{ __('schools.compare_schools') }}</h2>
    <p class="text-sm text-gray-600 mb-4">
        {{ __('schools.compare_schools_description') }}
    </p>

    <div class="row fields comparison-select position-relative">
        <div class="select-wrapper">
            {{--<label for="schoolA" class="block mb-1 font-medium">École 1</label>--}}
            <select wire:model.live="schoolA" id="schoolA" class="form-select w-full">
                <option value="">{{ __('schools.pick_a_school') }}</option>
                @foreach($schoolsAList as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="andvs">VS</div>
        <div class="select-wrapper">
            {{--<label for="schoolB" class="block mb-1 font-medium">École 2</label>--}}
            <select wire:model.live="schoolB" id="schoolB" class="form-select w-full">
                <option value="">{{ __('schools.pick_a_school') }}</option>
                @foreach($schoolsBList as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if($schoolAData && $schoolBData)
        <div class="overflow-x-auto row comparison-wrapper" >
            <div class="left-column">
                <div class="comparison-header schoola">
                    @if($schoolAData->images && !empty($schoolAData->images->path) && Storage::disk('public')->exists($schoolAData->images->path))
                        <img src="{{ Storage::disk('public')->url($schoolAData->images->path) }}" width="100px" alt="{{ $schoolAData->images->path }}">
                    @else
                        -
                    @endif
                    {{ $schoolAData->name }}
                </div>
                <div class="comparison-row schoola">
                    {!! $schoolAData->description ?? '—' !!}
                    <p><a href="{{ route('view_school', $schoolAData->slug) }}"></a></p>
                </div>
                <h4>{{ __('schools.programs') }}</h4>
                <div class="comparison-row schoola">
                    @foreach($schoolAData->programs as $program)
                        @if($program->has('accreditationBodies'))
                            <h6><span class="badge text-wrap bi bi-bookmark program"> &nbsp;{{ $program->name }}</span></h6>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="right-column">
                <div class="comparison-header schoolb">
                    @if($schoolBData->images && !empty($schoolBData->images->path) && Storage::disk('public')->exists($schoolBData->images->path))
                        <img src="{{ Storage::disk('public')->url($schoolBData->images->path) }}" width="100px" alt="{{ $schoolBData->images->path }}">
                    @else
                        -
                    @endif
                    {{ $schoolBData->name }}
                </div>
                <div class="comparison-row schoolb">
                    {!! $schoolBData->description ?? '—' !!}
                    <p><a href="{{ route('view_school', $schoolBData->slug) }}"></a></p>
                </div>
                <h4>{{ __('schools.programs') }}</h4>
                <div class="comparison-row schoola">
                    @foreach($schoolAData->programs as $program)
                        @if($program->has('accreditationBodies'))
                            <h6><span class="badge text-wrap bi bi-bookmark program"> &nbsp;{{ $program->name }}</span></h6>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
