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
        <div class="col-12">
            <select wire:model.live="domain" id="domain" class="form-select w-full">
                <option value="">{{ __('schools.filter_by_domain') }}</option>
                @foreach($domains as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if(!empty($schoolA && $schoolB))
    <div class="row comparison-filter-wrapper">
        <select wire:model.live="domain" id="domains" class="form-select w-full">
            <option value="---"> {{ __('schools.filter_by_domain') }}</option>
            @foreach($domains as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>
    @endif

    <div id="spinner" wire:loading class="justify-content-center"><span class="loader"></span></div>
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
                    @foreach($schoolAPrograms as $program)
                        <div class="program-row">
                            <div class="program-name">
                                <span class="badge text-wrap bi bi-bookmark program"></span>
                                <a href="{{ route('view_program', $program->slug) }}">{{ $program->name }}</a>
                            </div>
                            <div>
                                <p class="m-0 p-0">{{ __('schools.domains') }}</p>
                                <ul>
                                    {!! '<li>' . implode(', ', $program->domains->pluck('name')->toArray()) . '</li>' !!}
                                </ul>
                            </div>
                            <div class="program-accreds">
                                <p class="m-0 p-0">{{ __('schools.accreditations') }}</p>
                                <ul>
                                    {!! '<li>' . implode(', ', $program->accreditationBodies->pluck('name')->toArray()) . '</li>' !!}
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="comparison-row schoola mt-4">
                    {!! $schoolAData->hasDoubleDiplome ? '<span class="badge badge-success bi bi-mortarboard-fill">&nbsp;' . __('schools.has_programs_with_double_diplomes') . '</span>' : '' !!}
                    {!! $schoolAData->guarantiesInternship ? '<span class="badge badge-success bi bi-buildings">&nbsp;' . __('schools.has_programs_with_guaranties_internship') . '</span>' : '' !!}
                    {!! $schoolAData->jobGuarantee ? '<span class="badge badge-success bi bi-building-fill">&nbsp;' . __('schools.has_programs_with_job_guarantee') . '</span>' : '' !!}
                    {!! $schoolAData->studyAbroad ? '<span class="badge badge-success bi bi-globe-europe-africa-fill">&nbsp;' . __('schools.offers_study_abroad_programs') . '</span>' : '' !!}
                    {!! $schoolAData->has_incubator ? '<span class="badge badge-success bi bi-rocket-takeoff-fill">&nbsp;' . __('schools.include_an_incubator') . '</span>' : '' !!}
                </div>
                <div class="comparison-row schoola mt-4">
                    <p><strong class="bi bi-pin-map"> {{ __('schools.address') }}</strong></p>
                    {{ $schoolAData->address . ' ' . $schoolAData?->city . ' (' . $schoolAData?->country . ')' }}
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
                <div class="comparison-row schoolb">
                    @foreach($schoolBPrograms as $program)
                        <div class="program-row">
                            <div class="program-name">
                                <span class="badge text-wrap bi bi-bookmark program"></span>
                                <a href="{{ route('view_program', $program->slug) }}">{{ $program->name }}</a>
                            </div>
                            <div>
                                <p class="m-0 p-0">{{ __('schools.domains') }}</p>
                                <ul>
                                    {!! '<li>' . implode(', ', $program->domains->pluck('name')->toArray()) . '</li>' !!}
                                </ul>
                            </div>
                            <div class="program-accreds">
                                <p class="m-0 p-0">{{ __('schools.accreditations') }}</p>
                                <ul>
                                    {!! '<li>' . implode(', ', $program->accreditationBodies->pluck('name')->toArray()) . '</li>' !!}
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="comparison-row schoolb mt-4">
                    {!! $schoolBData->hasDoubleDiplome ? '<span class="badge badge-success bi bi-mortarboard-fill">&nbsp;' . __('schools.has_programs_with_double_diplomes') . '</span>' : '' !!}
                    {!! $schoolBData->guarantiesInternship ? '<span class="badge badge-success bi bi-buildings"> ' . __('schools.has_programs_with_guaranties_internship') . '</span>' : '' !!}
                    {!! $schoolBData->jobGuarantee ? '<span class="badge badge-success bi bi-buildings-fill">&nbsp;' . __('schools.has_programs_with_job_guarantee') . '</span>' : '' !!}
                    {!! $schoolBData->studyAbroad ? '<span class="badge badge-success bi bi-globe-europe-africa-fill">&nbsp;' . __('schools.offers_study_abroad_programs') . '</span>' : '' !!}
                    {!! $schoolBData->has_incubator ? '<span class="badge badge-success bi bi-rocket-takeoff-fill">&nbsp;' . __('schools.include_an_incubator') . '</span>' : '' !!}
                </div>
                <div class="comparison-row schoola mt-4">
                    <p><strong class="bi bi-pin-map"> {{ __('schools.address') }}</strong></p>
                    {{ $schoolBData->address . ' ' . $schoolBData?->city . ' (' . $schoolBData?->country . ')' }}
                </div>
            </div>
        </div>
    @endif
</div>
