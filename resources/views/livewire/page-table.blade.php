<div>
    <div class="row mb-3">
        <div class="col-md-5">
            <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Rechercher">
        </div>

        <div class="col-md-5">
            <select wire:model.live="filterPublished" class="form-select">
                <option value="">Tout</option>
                <option value="published">Publiée</option>
                <option value="draft">Brouillon</option>
                <option value="archived">Archivée</option>
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
                    {{ __('pages.form.locale') }} @if($sortField === 'language') <x-sort-icon :direction="$sortDirection" /> @endif
                </th>
                <th>{{ __('pages.form.status') }}</th>
                <th>{{ __('pages.form.published_at') }}</th>
                <th>{{ __('commons.actions') }}</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($pages as $page)
                <tr>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->locale }}</td>
                    <td>{{ $page->status }}</td>
                    <td>{{ $page->published_at }}</td>
                    <td>
                        <a href="{{ route('page.edit', $page) }}" class="btn btn-sm btn-primary mx-1">{{ __('commons.edit') }}</a>
                        @if(! $page->cannot_delete)
                        <button wire:click="confirmDelete({{ $page->id }})" class="btn btn-sm btn-danger mx-1">{{ __('commons.delete') }}</button>
                        @endif
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
        {{ $pages->links() }}
    </div>
    <x-delete-modal
        :showDeleteModal="$showDeleteModal"
        title="Supprimer la page"
        message="Êtes-vous sûr de vouloir supprimer cette page ?"
    />
</div>
