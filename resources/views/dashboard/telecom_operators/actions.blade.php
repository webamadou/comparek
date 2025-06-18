<a href="{{ route('telecom-operators.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>

<form action="{{ route('telecom-operators.destroy', $row->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
