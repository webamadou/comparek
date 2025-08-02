<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use HasSlug;

    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'is_home_page_big_image' => 'boolean',
        'published_at' => 'datetime',
        'schema_json' => 'array',
    ];

    /**
     * Get the options for generating the slug.
     */


    public function images(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function imageUrl(): string
    {
        return ! empty($this->images->path)
            ? Storage::url($this->images->path)
            : asset('frontv1/img/illustration/default-img.png');
    }
}
