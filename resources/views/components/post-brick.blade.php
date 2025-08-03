<div class="small-grid">
    <div class="card h-100 shadow">
        <div class="image-wrapper position-relative">
            <a class="img-link" href="{{ route('view_article', $post) }}"
               style="background: url({{ $post->imageUrl() }}); background-repeat: no-repeat; background-size: cover; background-position: center;"
            >
                <span class="badge mb-2">{{ $post->category->name }}</span>
            </a>
        </div>
        <div class="card-body">
            <h6 class="fw-bold">
                <a href="{{ route('view_article', $post) }}">{{ $post->name }}</a>
            </h6>
            <div class="text-muted small mt-2">
                • {{ $post->published_at?->format('d M Y') }} •
            </div>
        </div>
    </div>
</div>
