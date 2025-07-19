<a href="{{ route('program_features.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>

<form action="{{ route('program_features.destroy', $row->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm({{__('commons.are_u_sure')}})">{{ __('commons.delete') }}</button>
</form>
