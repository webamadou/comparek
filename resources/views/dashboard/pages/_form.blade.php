{{-- resources/views/admin/pages/_form.blade.php --}}
@csrf
<div class="row g-3">
  <div class="col-md-2">
    <label class="form-label">Locale</label>
    <input type="text" name="locale" class="form-control" value="{{ old('locale', $page->locale ?? 'fr') }}" disabled>
  </div>
  <div class="col-md-10">
    <label class="form-label">Titre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $page->name) }}" required>
  </div>

  <!-- <div class="col-12">
    <label class="form-label">Excerpt</label>
    <input type="text" name="excerpt" class="form-control" value="{{ old('excerpt', $page->excerpt) }}">
  </div> -->

  <div class="col-12">
    <label class="form-label">Contenu (HTML/Markdown)</label>
    <textarea name="body" rows="10" class="form-control">{{ old('body', $page->body) }}</textarea>
  </div>

  <div class="col-md-3">
    <label class="form-label">Modèle</label>
    <input type="text" name="template" class="form-control" value="{{ old('template', $page->template) }}" placeholder="default">
  </div>
  <div class="col-md-3">
    <label class="form-label">Statut</label>
    <select name="status" class="form-select">
      @foreach(['draft'=>'Brouillon','published'=>'Publié','archived'=>'Archivé'] as $v=>$label)
        <option value="{{ $v }}" @selected(old('status', $page->status ?? 'draft') === $v)>{{ $label }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-3">
    <label class="form-label">Publié le</label>
    <input type="datetime-local" name="published_at" class="form-control"
           value="{{ old('published_at', optional($page->published_at)->format('Y-m-d\TH:i')) }}">
  </div>

  <div class="col-12"><hr><h6 class="mt-2 mb-0">SEO</h6></div>

  <div class="col-md-6">
    <label class="form-label">Meta Title</label>
    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->meta_title) }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">Meta Description</label>
    <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description', $page->meta_description) }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">Keywords (comma-separated)</label>
    <input type="text" name="meta_keywords_csv" class="form-control"
           value="{{ old('meta_keywords_csv', isset($page->meta_keywords) ? implode(',', $page->meta_keywords) : '') }}">
    <small class="text-muted">Stored as JSON array.</small>
  </div>
  <div class="col-md-3">
    <label class="form-label">Robots</label>
    <input type="text" name="meta_robots" class="form-control" value="{{ old('meta_robots', $page->meta_robots ?? 'index,follow') }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Canonical URL</label>
    <input type="url" name="canonical_url" class="form-control" value="{{ old('canonical_url', $page->canonical_url) }}">
  </div>

  <div class="col-12"><hr><h6 class="mt-2 mb-0">Social</h6></div>

  <div class="col-md-6">
    <label class="form-label">OG Title</label>
    <input type="text" name="og_title" class="form-control" value="{{ old('og_title', $page->og_title) }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">OG Description</label>
    <input type="text" name="og_description" class="form-control" value="{{ old('og_description', $page->og_description) }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">OG Image Path</label>
    <input type="text" name="og_image_path" class="form-control" value="{{ old('og_image_path', $page->og_image_path) }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Twitter Card</label>
    <select name="twitter_card" class="form-select">
      <option value="">—</option>
      @foreach(['summary','summary_large_image'] as $opt)
        <option value="{{ $opt }}" @selected(old('twitter_card',$page->twitter_card) === $opt)>{{ $opt }}</option>
      @endforeach
    </select>
  </div>

  <div class="col-12">
    <label class="form-label">Schema.org (JSON)</label>
    <textarea name="schema_json" rows="4" class="form-control">{{ old('schema_json', $page->schema_json ? json_encode($page->schema_json, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) : '') }}</textarea>
  </div>

  <div class="col-12 d-flex gap-2 mt-2">
    <button class="btn btn-primary" type="submit">{{ __('commons.save') }}</button>
    <a class="btn btn-outline-secondary" href="{{ route('page.index') }}">{{ __('commons.cancel') }}</a>
  </div>
</div>

@push('scripts')
<script>
  // Convert CSV keywords -> hidden JSON array before submit
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    if (!form) return;
    form.addEventListener('submit', () => {
      const csv = form.querySelector('[name="meta_keywords_csv"]')?.value || '';
      const arr = csv.split(',').map(s => s.trim()).filter(Boolean);
      // inject hidden input
      let hidden = form.querySelector('input[name="meta_keywords[]"]');
      if (hidden) hidden.remove();
      const input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'meta_keywords';
      input.value = JSON.stringify(arr);
      form.appendChild(input);

      // Ensure schema_json parses
      const sj = form.querySelector('[name="schema_json"]');
      if (sj && sj.value) {
        try { JSON.parse(sj.value); } catch (e) { alert('Invalid JSON in Schema.org'); event.preventDefault(); }
      }
    });
  });
</script>
@endpush
