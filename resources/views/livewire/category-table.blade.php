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
                    {{ __('commons.name') }} @if($sortField === 'name') <x-sort-icon :direction="$sortDirection" /> @endif
                </th>
                <th>{{ __('commons.actions') }}</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }} <br>
                    </td>
                    <td>
                        <a href="{{ route('category.edit', $category) }}" class="btn btn-sm btn-primary mx-1">{{ __('commons.edit') }}</a>
                        <button wire:click="confirmDelete({{ $category->id }})" class="btn btn-sm btn-danger mx-1">{{ __('commons.delete') }}</button>
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
        {{ $categories->links() }}
    </div>
    <x-delete-modal
        :showDeleteModal="$showDeleteModal"
        title="Supprimer la catégorie"
        message="Êtes-vous sûr de vouloir supprimer cette catégorie ?"
    />
</div>
