<div>
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model.change.debounce.300ms="search" class="form-control" placeholder="Search by name or city">
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
                    Name @if($sortField === 'name') <x-sort-icon :direction="$sortDirection" /> @endif
                </th>
                <th wire:click="sortBy('city')" style="cursor:pointer">
                    // City @if($sortField === 'city') <x-sort-icon :direction="$sortDirection" /> @endif
                </th>
                <th wire:click="sortBy('country')" style="cursor:pointer">
                    //cCountry @if($sortField === 'country') <x-sort-icon :direction="$sortDirection" /> @endif
                </th>
                <th>Accredited</th>
                <th>Foreign Students</th>
                <th>Actions</th>
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
                            {{ $school->is_accredited ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ $school->accepts_foreign_students ? 'bg-primary' : 'bg-light text-dark' }}">
                            {{ $school->accepts_foreign_students ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-primary mx-1">Editer</a>
                        <button wire:click="confirmDelete({{ $school->id }})" class="btn btn-sm btn-danger mx-1">Supprimer</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No schools found.</td>
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
