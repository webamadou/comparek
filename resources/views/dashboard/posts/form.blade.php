@extends('layouts.dashboard')

@section('content')
    <div class="body flex-grow-1">
        <div class="container-lg px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="display-4">{{ $post->exists ? __('posts.edit') : __('posts.add_new') }}</h1>

                    <form method="POST"
                          action="{{ $post->exists ? route('post.update', $post) : route('post.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if($post->exists)
                            @method('PUT')
                        @endif

                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $post->name ?? '') }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Catégorie</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option value="">— Aucune —</option>
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}" @selected(old('category_id', $post->category_id ?? '') == $id)>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Résumé</label>
                            <textarea name="excerpt" id="excerpt" rows="3" class="form-control">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Contenu</label>
                            <textarea name="content" id="content" rows="10" class="form-control">{{ old('content', $post->content ?? '') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="feature_image" class="form-label">{{ __('commons.feature_image') }}</label>
                            <small>{{ __('commons.feature_image_help') }}</small>
                            <input type="file" class="form-control" name="feature_image">
                            @if($post->images)
                                <img src="{{ Storage::url($post->images->path) }}" alt="Logo" height="60" class="mt-2">
                            @endif
                        </div>
                        <hr>
                        <h5 class="mt-4">🔍 SEO</h5>

                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="2" class="form-control">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Mots-clés (séparés par des virgules)</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords ?? '') }}" class="form-control">
                        </div>

                        <!-- <div class="mb-3">
                            <label for="canonical_url" class="form-label">URL Canonique</label>
                            <input type="url" name="canonical_url" id="canonical_url" value="{{ old('canonical_url', $post->canonical_url ?? '') }}" class="form-control">
                        </div> -->

                        <div class="mb-3">
                            <label for="robots_directives" class="form-label">Robots directives</label>
                            <select name="robots_directives" id="robots_directives" class="form-select">
                                <option value="">— Choisir —</option>
                                <option value="index,follow" @selected(old('robots_directives', $post->robots_directives ?? '') == 'index,follow')>index, follow</option>
                                <option value="noindex,follow" @selected(old('robots_directives', $post->robots_directives ?? '') == 'noindex,follow')>noindex, follow</option>
                                <option value="noindex,nofollow" @selected(old('robots_directives', $post->robots_directives ?? '') == 'noindex,nofollow')>noindex, nofollow</option>
                            </select>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="published_at" class="form-label">Date de publication</label>
                                <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', isset($post->published_at) ? $post->published_at->format('Y-m-d\TH:i') : '') }}" class="form-control">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="is_published" class="form-label">Publié ?</label>
                                <select name="is_published" id="is_published" class="form-select">
                                    <option value="0" @selected(old('is_published', $post->is_published ?? 0) == 0)>Non</option>
                                    <option value="1" @selected(old('is_published', $post->is_published ?? 0) == 1)>Oui</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">

                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
