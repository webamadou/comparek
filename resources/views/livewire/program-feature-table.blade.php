<div>
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Rechercher">
        </div>
    </div>

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th wire:click="sortBy('name')" style="cursor:pointer">
                    Name @if($sortField === 'name') <x-sort-icon :direction="$sortDirection" /> @endif
                </th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($features as $feature)
                <tr>
                    <td>
                        {{ $feature->name }} <br>
                        @if($feature->images)
                            <img src="{{ Storage::disk('public')->url($feature->images->path) }}" width="100" alt="{{ $feature->images->path }}">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('program_features.edit', $feature) }}" class="btn btn-sm btn-primary mx-1">{{ __('commons.edit') }}</a>
                        <button wire:click="confirmDelete({{ $feature->id }})" class="btn btn-sm btn-danger mx-1">
                            {{ __('commons.delete') }}</button>
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
        {{ $features->links() }}
    </div>
    <x-delete-modal
        :showDeleteModal="$showDeleteModal"
        title="Supprimer l'ecole"
        message="Êtes-vous sûr de vouloir supprimer cet ecole ?"
    />
</div>
