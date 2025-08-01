<div>
    <input type="text" wire:model.live.debounce.500ms="search" placeholder="Rechercher un article..." class="form-control mb-3">

    <table class="table">
        <thead>
            <tr>
                <th>-</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Publié</th>
                <th>Vues</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>
                        @if($post->images)
                            <img src="{{ Storage::url($post->images->path) }}" alt="Logo" height="60" class="mt-2">
                        @else
                            <img src="{{ asset('frontv1/img/illustration/default-img.png') }}" width="25%" alt="Default school image">
                        @endif
                    </td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->category->name ?? '—' }}</td>
                    <td>{{ $post->is_published ? 'Oui' : 'Non' }}</td>
                    <td>{{ $post->views_count }}</td>
                    <td>
                        <a href="{{ route('post.edit', $post) }}" class="btn btn-sm btn-primary">{{ __('commons.edit') }}</a>
                        <button wire:click="confirmDelete({{ $post->id }})" class="btn btn-sm btn-danger mx-1">{{ __('commons.delete') }}</button>
                        </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}

    <x-delete-modal
        :showDeleteModal="$showDeleteModal"
        title="Supprimer l'article"
        message="Êtes-vous sûr de vouloir supprimer cet article ?"
    />
</div>
