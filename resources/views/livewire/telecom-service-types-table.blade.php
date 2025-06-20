<div>
    <div class="col-md-3">
        <input wire:model.debounce.500ms="searchName" type="text" class="form-control" placeholder="Search Name">{{$searchName}}
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th wire:click="sortBy('name')" style="cursor:pointer;">Name @if($sortField == 'name') ({{ $sortDirection }}) @endif</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('telecom_service_type.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $items->links() }}

    {{-- Delete modal --}}
    @if ($showDeleteModal)
        <div class="modal show d-block" style="background: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Confirm deletion</h5></div>
                    <div class="modal-body">Are you sure to delete this service type?</div>
                    <div class="modal-footer">
                        <button wire:click="$set('showDeleteModal', false)" class="btn btn-secondary">Cancel</button>
                        <button wire:click="delete" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
