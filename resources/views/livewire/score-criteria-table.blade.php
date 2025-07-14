<div>

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model.debounce.500ms="searchName" class="form-control" placeholder="Search Name">
        </div>
        <div class="col-md-4">
            <select wire:model="searchVertical" class="form-control">
                <option value="">All Verticals</option>
                @foreach (\App\Enums\ComparekEnum::cases() as $vertical)
                    <option value="{{ $vertical->value }}">{{ $vertical->label() }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-danger" wire:click="deleteSelected" {{ empty($selected) ? 'disabled' : '' }}>
            Delete selected ({{ count($selected) }})
        </button>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th><input type="checkbox" wire:model="selectAll"></th>
            <th wire:click="sortBy('vertical')" style="cursor:pointer;">Domaine @if($sortField == 'vertical')
                    ({{ $sortDirection }})
                @endif</th>
            <th wire:click="sortBy('name')" style="cursor:pointer;">Nom @if($sortField == 'name')
                    ({{ $sortDirection }})
                @endif</th>
            <th wire:click="sortBy('weight')" style="cursor:pointer;">Ponderation @if($sortField == 'weight')
                    ({{ $sortDirection }})
                @endif</th>
            <th>-</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($items as $item)
            <tr>
                <td><input type="checkbox" wire:model="selected" value="{{ $item->id }}"></td>
                <td>{{ $item->vertical->label() }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->weight }} %</td>
                <td>
                    <a href="{{ route('score_criteria.edit', $item) }}" class="btn btn-sm btn-primary">Editer</a>
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
                    <div class="modal-body">Êtes-vous sûr de vouloir supprimer ce critère ?</div>
                    <div class="modal-footer">
                        <button wire:click="$set('showDeleteModal', false)" class="btn btn-secondary">Cancel</button>
                        <button wire:click="delete" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
