<div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th wire:click="sortBy('name')" style="cursor:pointer;">Name @if($sortField == 'name') ({{ $sortDirection }}) @endif</th>
                <th wire:click="sortBy('feature')" style="cursor:pointer;">Feature</th>
                <th>Volume</th>
                <th>Appels - SMS - Credits</th>
                <th>Valable Jusqu'a</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->offer?->name }}</td>
                    <td>
                        <strong>{{ $item->data_volume_value }}</strong> {{ $item->data_volume_unit }}
                    </td>
                    <td>
                        @if (! empty($item->voice_minutes))
                            <span class="iconify" data-icon="mdi-telephone"></span> {{ $item->voice_minutes }} minutes<br>
                        @endif
                        @if (! empty($item->sms_nbr))
                            <span class="iconify" data-icon="mdi-message-processing"></span> {{ $item->sms_nbr }} sms
                        @endif
                        @if (! empty($item->phone_credit))
                            <span class="iconify" data-icon="mdi-stack-overflow"></span> {{ $item->phone_credit }}F de crédits
                        @endif
                    </td>
                    <td>
                        @if ($item->validity_length)
                            {{ $item->validity_length }} jours
                        @endif
                    </td>
                    <td>{{ $item->price }}</td>
                    {{--<td>{!! $item->is_highlighted ? '<span class="iconify" color="green" data-icon="mdi-thumb-up"></span>' : '<span class="iconify" color="red" data-icon="mdi-thumb-down"></span>' !!}</td>--}}
                    <td>
                        <a href="{{ route('telecom_offer_feature.edit', $item) }}" class="btn btn-sm btn-primary mx-1">Edit</a>
                        <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger mx-1">Delete</button>
                        <a href="btn btn-success">score</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $items->links() }}
    </div>

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
