<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class TelecomOperator extends Model
{
    /** @use HasFactory<\Database\Factories\TelecomOperatorFactory> */
    use HasSlug;
    use HasFactory;

    protected $guarded = [];

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

    public function offers(): HasMany
    {
        return $this->hasMany(TelecomOffer::class, 'telecom_operator_id');
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
}
