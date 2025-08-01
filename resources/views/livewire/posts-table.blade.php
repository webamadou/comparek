<div>
    <input type="text" wire:model.debounce.500ms="search" placeholder="Rechercher un article..." class="form-control mb-3">

    <table class="table">
        <thead>
            <tr>
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
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name ?? '—' }}</td>
                    <td>{{ $post->is_published ? 'Oui' : 'Non' }}</td>
                    <td>{{ $post->views_count }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>
