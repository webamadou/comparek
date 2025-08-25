<?php

namespace App\Models;

use App\Enums\ProductType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class BankProduct extends Model
{
    /** @use HasFactory<\Database\Factories\BankProductFactory> */
    use HasFactory;
    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : \Spatie\Sluggable\SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_')
            ->doNotGenerateSlugsOnUpdate();
    }

    protected $fillable = [
        'bank_id','name','slug','product_type','currency','is_active','description'
    ];
    protected $casts = [
        'is_active' => 'bool',
        'product_type' => ProductType::class,
    ];

    protected static function booted(): void
    {
        static::creating(function (self $p) {
            if (empty($p->slug)) $p->slug = Str::slug($p->name);
        });
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function offers()
    {
        return $this->hasMany(ProductOffer::class);
    }
}
