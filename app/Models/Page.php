<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    protected $fillable = [
        'locale','name','slug','excerpt','body','page_footer','template',
        'status','published_at',
        'meta_title','meta_description','meta_keywords','meta_robots','canonical_url',
        'og_title','og_description','og_image_path','twitter_card',
        'schema_json','author_id', 'cannot_delete',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'meta_keywords' => 'array',
        'schema_json' => 'array',
        'cannot_delete' => 'boolean',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_')
            ->doNotGenerateSlugsOnUpdate();
    }

    // Accessors with safe fallbacks
    public function getEffectiveMetaTitleAttribute(): string
    {
        return $this->meta_title ?: str($this->title)->limit(60);
    }

    public function getEffectiveMetaDescriptionAttribute(): ?string
    {
        return $this->meta_description ?: ($this->excerpt ? str($this->excerpt)->limit(155) : null);
    }

    // Scopes
    public function scopePublished($q)
    {
        return $q->where('status', 'published')
                 ->whereNotNull('published_at')
                 ->where('published_at', '<=', now());
    }

    public function scopeSearch($q, ?string $term)
    {
        if (! $term) return $q;
        return $q->where(function ($qq) use ($term) {
            $qq->where('title','like',"%{$term}%")
               ->orWhere('slug','like',"%{$term}%")
               ->orWhere('meta_description','like',"%{$term}%");
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
