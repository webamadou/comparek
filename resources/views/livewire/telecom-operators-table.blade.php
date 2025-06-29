<div>

    {{-- Filters --}}
    <div class="row mb-3">
        <div class="col-md-3">
            <input wire:model.debounce.500ms="searchName" type="text" class="form-control" placeholder="Search Name">{{$searchName}}
        </div>
        <div class="col-md-3">
            <input wire:model.debounce.500ms="searchSlug" type="text" class="form-control" placeholder="Search Slug">
        </div>
        <div class="col-md-3">
            <select wire:model="searchActive" class="form-control">
                <option value="">All Status</option>
                <option value="1">Active ✅</option>
                <option value="0">Inactive ❌</option>
            </select>
        </div>
        <div class="col-md-3">
            <select wire:model="perPage" class="form-control">
                <option value="10">10 rows</option>
                <option value="25">25 rows</option>
                <option value="50">50 rows</option>
                <option value="100">100 rows</option>
            </select>
        </div>
    </div>

    {{-- Table --}}
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th wire:click="sortBy('name')" style="cursor:pointer;">
                    Name @if($sortField == 'name') ({{ $sortDirection }}) @endif
                </th>
                <th wire:click="sortBy('slug')" style="cursor:pointer;">
                    Slug @if($sortField == 'slug') ({{ $sortDirection }}) @endif
                </th>
                <th>Website</th>
                <th>Active</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($operators as $operator)
                <tr>
                    <td>{{ $operator->name }}</td>
                    <td>{{ $operator->slug }}</td>
                    <td><a href="{{ $operator->website_url }}" target="_blank">{{ $operator->website_url }}</a></td>
                    <td>{{ $operator->is_active ? '✅' : '❌' }}</td>
                    <td>{{ $operator->created_at?->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('telecom_operator.edit', $operator) }}" class="btn btn-sm btn-primary">Editer</a>
                        <button wire:click="confirmDelete({{ $operator->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $operators->links() }}

    {{-- Delete confirmation modal --}}
    <x-delete-modal
        :showDeleteModal="$showDeleteModal"
        title="Delete Telecom Operator"
        message="Are you sure you want to delete this telecom operator?"
    />
</div>
