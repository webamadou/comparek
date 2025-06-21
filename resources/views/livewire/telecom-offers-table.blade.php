<div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th wire:click="sortBy('name')" style="cursor:pointer;">Name @if($sortField == 'name') ({{ $sortDirection }}) @endif</th>
                <th wire:click="sortBy('operator_name')" style="cursor:pointer;">
                    Operateur @if($sortField == 'operator_name') ({{ $sortDirection }}) @endif
                </th>
                <th wire:click="sortBy('service_type')" style="cursor:pointer;">
                    Type de service @if($sortField == 'service_type') ({{ $sortDirection }}) @endif
                </th>
                <th wire:click="sortBy('price_per_month')" style="cursor:pointer;">
                    Prix
                    @if($sortField == 'price_per_month')
                        ({{ $sortDirection }})
                    @endif
                </th>
                <th>Postpaid</th>
                <th>En Ligne</th>
                <th> &nbsp;</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->operator?->name }}</td>
                    <td>{{ $item->serviceType?->name }}</td>
                    <td>{{ $item->price_per_month }} CFA</td>
                    <td>{!! $item->is_postpaid ? '<span class="iconify" color="green" data-icon="mdi-thumb-up"></span>' : '<span class="iconify" color="red" data-icon="mdi-thumb-down"></span>' !!}</td>
                    <td>{!! $item->available_online ? '<span class="iconify" color="green" data-icon="mdi-thumb-up"></span>' : '<span class="iconify" color="red" data-icon="mdi-thumb-down"></span>' !!}</td>
                    <td>
                        <a href="{{ route('telecom_offer.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $items->links() }}

    {{-- Delete Modal --}}
    @if ($showDeleteModal)
        <div class="modal show d-block" style="background: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Confirm deletion</h5></div>
                    <div class="modal-body">Are you sure to delete this offer?</div>
                    <div class="modal-footer">
                        <button wire:click="$set('showDeleteModal', false)" class="btn btn-secondary">Cancel</button>
                        <button wire:click="delete" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
