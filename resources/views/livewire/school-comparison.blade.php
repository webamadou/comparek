<div class="container py-4">
    <h2>{{ __('schools.compare_schools') }}</h2>
    <p class="text-sm text-gray-600 mb-4">
        {{ __('schools.compare_schools_description') }}
    </p>

    <div class="row fields">
        <div class="col-6">
            {{--<label for="schoolA" class="block mb-1 font-medium">École 1</label>--}}
            <select wire:model.live="schoolA" id="schoolA" class="form-select w-full">
                <option value="">{{ __('schools.pick_a_school') }}</option>
                @foreach($schoolsAList as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-6">
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
            <div class="col-2 comparison-header criteria">{{ __('schools.criteria') }}</div>
            <div class="col-5 comparison-header schoola">
                @if($schoolAData->images && !empty($schoolAData->images->path) && Storage::disk('public')->exists($schoolAData->images->path))
                    <img src="{{ Storage::disk('public')->url($schoolAData->images->path) }}" width="100px" alt="{{ $schoolAData->images->path }}">
                @else
                    -
                @endif
                {{ $schoolAData->name }}
            </div>
            <div class="col-5 comparison-header schoolb">
                @if($schoolBData->images && !empty($schoolBData->images->path) && Storage::disk('public')->exists($schoolBData->images->path))
                    <img src="{{ Storage::disk('public')->url($schoolBData->images->path) }}" width="100px" alt="{{ $schoolBData->images->path }}">
                @else
                    -
                @endif
                {{ $schoolBData->name }}
            </div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-body-text"> {{ __('schools.description') }}</span></div>
            <div class="col-5 comparison-row schoola">
                {!! $schoolAData->description ?? '—' !!}
                <p><a href="{{ route('view_school', $schoolAData->slug) }}"></a></p>
            </div>
            <div class="col-5 comparison-row schoolb">
                {!! $schoolBData->description ?? '—' !!}
                <p><a href="{{ route('view_school', $schoolBData->slug) }}"></a></p>
            </div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-textarea"> {{ __('schools.accredited_programs') }}</span></div>
            <div class="col-5 comparison-row schoola">
                @foreach($schoolAData->programs as $program)
                    @if($program->has('accreditationBodies'))
                        <h6><span class="badge text-wrap bi bi-bookmark program"> &nbsp;{{ $program->name }}</span></h6>
                    @endif
                @endforeach
            </div>
            <div class="col-5 comparison-row schoolb">
                @foreach($schoolBData->programs as $program)
                    @if($program->has('accreditationBodies'))
                        <h6><span class="badge text-wrap bi bi-bookmark program"> &nbsp;{{ $program->name }}</span></h6>
                    @endif
                @endforeach
            </div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-signpost-split-fill"> {{ __('schools.school_type') }}</span></div>
            <div class="col-5 comparison-row schoola">{!! $schoolAData->is_private ? '<span class="round-private">' . __('schools.is_a_private') . '</span>' : '<span class="round-no-private">' . __('schools.is_a_public') . '</span>' !!}</div>
            <div class="col-5 comparison-row schoolb">{!! $schoolBData->is_private ? '<span class="round-private">' . __('schools.is_a_private') . '</span>' : '<span class="round-no-private">' . __('schools.is_a_public') . '</span>' !!}</div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-award-fill"> {{ __('schools.accreditations') }}</span></div>
            <div class="col-5 comparison-row schoola">
                @foreach($schoolAData->programs->map(fn($p) => $p->accreditationBodies->map(fn($a) => $a->name))
                    ->flatten()
                    ->unique()
                    ->toArray() as $acc)
                        <span class="badge"> <span class="bi bi-award"></span> {{ $acc }}</span>
                @endforeach
            </div>
            <div class="col-5 comparison-row schoolb">
                @foreach($schoolBData->programs->map(fn($p) => $p->accreditationBodies->map(fn($a) => $a->name))
                    ->flatten()
                    ->unique()
                    ->toArray() as $acc)
                        <span class="badge"> <span class="bi bi-award"></span> {{ $acc }}</span>
                @endforeach
            </div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-mortarboard-fill"> {{ __('schools.double_diplomes') }}</span></div>
            <div class="col-5 comparison-row schoola">{!! $schoolAData->hasDoubleDiplome ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>
            <div class="col-5 comparison-row schoolb">{!! $schoolBData->hasDoubleDiplome ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>

            <div class="col-2 comparison-row criteria"></span><span class="bi bi-buildings-fill"> {{ __('schools.has_internership') }}</span></div>
            <div class="col-5 comparison-row schoola">{!! $schoolAData->guarantiesInternship ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>
            <div class="col-5 comparison-row schoolb">{!! $schoolBData->guarantiesInternship ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-buildings-fill">&nbsp;  {{ __('schools.job_guarantee') }}</span></div>
            <div class="col-5 comparison-row schoola">{!! $schoolAData->jobGuarantee ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>
            <div class="col-5 comparison-row schoolb">{!! $schoolBData->jobGuarantee ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-patch-check-fill">&nbsp;  {{ __('schools.miage') }}</span></div>
            <div class="col-5 comparison-row schoola">{!! $schoolAData->miageOption ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>
            <div class="col-5 comparison-row schoolb">{!! $schoolBData->miageOption ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-globe-europe-africa-fill">&nbsp;  {{ __('schools.study_abroad') }}</span></div>
            <div class="col-5 comparison-row schoola">{!! $schoolAData->studyAbroad ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>
            <div class="col-5 comparison-row schoolb">{!! $schoolBData->studyAbroad ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-tools">&nbsp; {{ __('schools.double_skills') }}</span></div>
            <div class="col-5 comparison-row schoola">{!! $schoolAData->doubleSkills ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>
            <div class="col-5 comparison-row schoolb">{!! $schoolBData->doubleSkills ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-rocket-takeoff-fill">&nbsp; {{ __('schools.include_an_incubator') }}</span></div>
            <div class="col-5 comparison-row schoola">{!! $schoolAData->has_incubator === 1 ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>
            <div class="col-5 comparison-row schoolb">{!! $schoolBData->has_incubator === 1 ? '<span class="round-yes">' . __('commons.yes') . '</span>' : '<span class="round-no">' . __('commons.no') . '</span>' !!}</div>

            <div class="col-2 comparison-row criteria"><span class="bi bi-pin-map">&nbsp;{{ __('schools.address') }}</span></div>
            <div class="col-5 comparison-row schoola address">{{ $schoolAData->address . ' ' . $schoolAData?->city . ' (' . $schoolAData?->country . ')' }}</div>
            <div class="col-5 comparison-row schoolb address">{{ $schoolBData->address . ' ' . $schoolBData?->city . ' (' . $schoolBData?->country . ')' }}</div>
        </div>
    @endif
</div>
