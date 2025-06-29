<div>

    <div class="row mb-3">
        @foreach ($columns as $field => $label)
            @if (isset($filters[$field]))
                <div class="col">
                    <input type="text" wire:model="filters.{{ $field }}" class="form-control" placeholder="Filter {{ $label }}">
                </div>
            @endif
        @endforeach
    </div>

    <div class="mb-2">
        <button class="btn btn-danger" wire:click="deleteSelected" {{ empty($selected) ? 'disabled' : '' }}>
            Delete selected ({{ count($selected) }})
        </button>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th><input type="checkbox" wire:model="selectAll"></th>
                <th>-</th>
                @foreach ($columns as $field => $label)
                    <th wire:click="sortBy('{{ $field }}')" style="cursor:pointer;">
                        {{ $label }} @if($sortField == $field) ({{ $sortDirection }}) @endif
                    </th>
                @endforeach
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><input type="checkbox" wire:model="selected" value="{{ $item->id }}"></td>
                    <td>
                        @if($item->images)
                            <img src="{{ Storage::disk('public')->url($item->images->path) }}" width="100" alt="{{ $item->images->path }}">
                        @endif
                    </td>
                    @foreach ($columns as $field => $label)
                        <td>{{ data_get($item, $field) }}</td>
                    @endforeach
                    <td>
                        <a href="{{ route('telecom_operator.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $items->links() }}

    <x-delete-modal :showDeleteModal="$showDeleteModal" />
</div>
