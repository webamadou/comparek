<a href="{{ route('telecom_service_type.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>

<form action="{{ route('telecom_service_type.destroy', $row->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
