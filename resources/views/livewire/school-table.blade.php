<div>
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model.change.debounce.300ms="search" class="form-control" placeholder="Rechercher">
        </div>

        <div class="col-md-2">
            <select wire:model.change="filterAccredited" class="form-select">
                <option value="">Tout</option>
                <option value="1">Accredited</option>
                <option value="0">Not Accredited</option>
            </select>
        </div>

        <div class="col-md-2">
            <select wire:model.change="filterForeignStudents" class="form-select">
                <option value="">Tout</option>
                <option value="1">Accepts Foreign Students</option>
                <option value="0">Does Not Accept</option>
            </select>
        </div>

        <div class="col-md-2">
            <select wire:model.change="perPage" class="form-select">
                <option value="5">5 lignes</option>
                <option value="10">10 lignes</option>
                <option value="25">25 lignes</option>
                <option value="50">50 lignes</option>
            </select>
        </div>
    </div>

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th wire:click="sortBy('name')" style="cursor:pointer">
                    {{ __('commons.name') }} @if($sortField === 'name') <x-sort-icon :direction="$sortDirection" /> @endif
                </th>
                <th wire:click="sortBy('city')" style="cursor:pointer">
                    {{ __('commons.city') }} @if($sortField === 'city') <x-sort-icon :direction="$sortDirection" /> @endif
                </th>
                <th wire:click="sortBy('country')" style="cursor:pointer">
                    {{ __('commons.country') }} @if($sortField === 'country') <x-sort-icon :direction="$sortDirection" /> @endif
                </th>
                <th>{{ __('schools.accredited') }} </th>
                <th>{{ __('schools.foreign_students') }}</th>
                <th>{{ __('commons.actions') }}</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($schools as $school)
                <tr>
                    <td>
                        {{ $school->name }} <br>
                        @if($school->images)
                            <img src="{{ Storage::disk('public')->url($school->images->path) }}" width="100" alt="{{ $school->images->path }}">
                        @endif
                    </td>
                    <td>{{ $school->city }}</td>
                    <td>{{ $school->country }}</td>
                    <td>
                        <span class="badge {{ $school->is_accredited ? 'bg-success' : 'bg-secondary' }}">
                            {{ $school->is_accredited ? __('commons.yes') : __('commons.no') }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ $school->accepts_foreign_students ? 'bg-primary' : 'bg-light text-dark' }}">
                            {{ $school->accepts_foreign_students ? __('commons.yes') : __('commons.no') }}
                        </span>
                    </td>
                    <td>
                    <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-primary mx-1">{{ __('commons.edit') }}</a>
                        <button wire:click="confirmDelete({{ $school->id }})" class="btn btn-sm btn-danger mx-1">{{ __('commons.delete') }}</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">{{ __('commons.no_record_found') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $schools->links() }}
    </div>
    <x-delete-modal
        :showDeleteModal="$showDeleteModal"
        title="Supprimer l'ecole"
        message="Êtes-vous sûr de vouloir supprimer cet ecole ?"
    />
</div>
