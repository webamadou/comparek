<div>
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Recherche...">
        </div>
        <div class="col-md-3">
            <select wire:model.live="filterSchool" class="form-select">
                <option value="">Tous les écoles</option>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select wire:model.live="filterDomain" class="form-select">
                <option value="">Tous les domaines</option>
                @foreach ($domains as $domain)
                    <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select wire:model.live="perPage" class="form-select">
                @foreach ([10, 25, 50] as $n)
                    <option value="{{ $n }}">{{ $n }} par page</option>
                @endforeach
            </select>
        </div>
    </div>

    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th wire:click="sortBy('name')" style="cursor: pointer;">Program @if($sortField == 'name') <x-sort-icon :direction="$sortDirection" /> @endif</th>
                <th>{{ __('schools.school') }}</th>
                <th>{{ __('schools.level') }}</th>
                <th>{{ __('schools.duration') }}</th>
                <th>{{ __('schools.modality') }}</th>
                <th>{{ __('schools.tuition') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($programs as $program)
                <tr>
                    <td>{{ $program->name }}</td>
                    <td>{{ $program->school?->name }}</td>
                    <td>{{ $program->level->value ?? '-' }}</td>
                    <td>{{ $program->duration_years ?? '-' }} year(s)</td>
                    <td>{{ $program->modality ?? '-' }}</td>
                    <td>
                        @if ($program->registration_fee)
                            <p>{!! __('schools.registration_fee') . ' <strong>' . number_format($program->registration_fee, 0, ',', ' ') . '</strong> ' . $program->tuition_currency !!}</p>
                        @else
                            —
                        @endif
                        @if ($program->tuition_fee)
                            <p>{!! __('schools.tuition_fee') . ' <strong>' . number_format($program->tuition_fee, 0, ',', ' ') . '</strong> ' . $program->tuition_currency !!}</p>
                        @else
                            —
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('school_programs.edit', $program) }}" class="btn btn-sm btn-outline-primary">
                            <span class="iconify" data-icon="mdi-pencil"></span> {{ __('commons.edit') }}
                        </a>
                        <button wire:click="confirmDelete({{ $program->id }})" class="btn btn-sm btn-danger mx-1">
                            <span class="iconify" data-icon="mdi-trash"></span> {{ __('commons.delete') }}</button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center text-muted">{{ __('commons.no_record_found') }}</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $programs->links() }}

    {{-- Delete Modal --}}
    @if ($showDeleteModal)
        <div class="modal show d-block" style="background: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Confirm deletion</h5></div>
                    <div class="modal-body">Etes vous sur de vouloir supprimer ce programme?</div>
                    <div class="modal-footer">
                        <button wire:click="$set('showDeleteModal', false)" class="btn btn-secondary">Retour</button>
                        <button wire:click="delete" class="btn btn-danger">{{ __('commons.confirm_deletion') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

