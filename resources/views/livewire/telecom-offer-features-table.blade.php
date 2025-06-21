<div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th wire:click="sortBy('name')" style="cursor:pointer;">Name @if($sortField == 'name') ({{ $sortDirection }}) @endif</th>
                <th>Feature</th>
                <th>Valeur</th>
                <th>Unité</th>
                <th>Prix</th>
                <th>Highlighted</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->offer?->name }}</td>
                    <td>{{ $item->value }}</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{!! $item->is_highlighted ? '<span class="iconify" color="green" data-icon="mdi-thumb-up"></span>' : '<span class="iconify" color="red" data-icon="mdi-thumb-down"></span>' !!}</td>
                    <td>
                        <a href="{{ route('telecom_offer_feature.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">Delete</button>
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
                    <div class="modal-header"><h5 class="modal-title">Confirm deletion</h5></div>
                    <div class="modal-body">Are you sure to delete this feature?</div>
                    <div class="modal-footer">
                        <button wire:click="$set('showDeleteModal', false)" class="btn btn-secondary">Cancel</button>
                        <button wire:click="delete" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
