<?php

namespace App\Models;

use App\Enums\BankCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Bank extends Model
{
    /** @use HasFactory<\Database\Factories\BankFactory> */
    use HasFactory;
    use SoftDeletes;
    use HasSlug;

    protected $fillable = [
        'name','slug','logo_path','website_url','email','phone',
        'country_code','swift_bic','regulatory_license',
        'headquarters_location','established_year',
        'category','is_active','description','metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
        'is_active' => 'bool',
        'category' => BankCategory::class,
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

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function atms(): HasMany
    {
        return $this->hasMany(Atm::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(BankProduct::class);
    }

    public function images(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
