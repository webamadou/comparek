<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class School extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $guarded = [];

    protected $casts = [
        'is_accredited' => 'boolean',
        'accepts_foreign_students' => 'boolean',
        'is_active' => 'boolean',
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

    public function images(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function logoUrl(): ?string
    {
        return $this->image?->path ? asset($this->image->path) : null;
    }

    public function logoThumb(): ?string
    {
        return $this->primaryImage?->thumbnail_path ? asset($this->primaryImage->thumbnail_path) : null;
    }

    public function programs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SchoolProgram::class);
    }
}
