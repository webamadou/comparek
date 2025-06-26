<div>

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model.debounce.500ms="searchCriteria" class="form-control" placeholder="Search Criteria Name">
        </div>
        <div class="col-md-4">
            <input type="text" wire:model.debounce.500ms="searchEntityType" class="form-control" placeholder="Search Entity Type (e.g. TelecomOffer)">
        </div>
    </div>

    <a href="{{ route('score_value.create') }}" class="btn btn-success mb-3">Ajouter</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th wire:click="sortBy('score_criteria_id')" style="cursor:pointer;">Critère</th>
                <th wire:click="sortBy('vertical_entity_type')" style="cursor:pointer;">Type</th>
                <th wire:click="sortBy('vertical_entity_id')" style="cursor:pointer;">ID</th>
                <th wire:click="sortBy('value')" style="cursor:pointer;">Score</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->criteria?->name ? $item->criteria?->name . '     (' .$item->criteria?->weight . '%)' : '-' }}</td>
                    <td>{{ class_basename($item->vertical_entity_type) }}</td>
                    <td>{{ $item->vertical_entity_id }}</td>
                    <td>{{ $item->value }}</td>
                    <td>
                        <a href="{{ route('score_value.edit', $item) }}" class="btn btn-sm btn-primary">Editer</a>
                        <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $items->links() }}

    @if ($showDeleteModal)
        <div class="modal show d-block" style="background: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Confirmation</h5></div>
                    <div class="modal-body">Êtes-vous sûr de vouloir supprimer ce score ?</div>
                    <div class="modal-footer">
                        <button wire:click="$set('showDeleteModal', false)" class="btn btn-secondary">Retour</button>
                        <button wire:click="delete" class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
