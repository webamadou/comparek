<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class TelecomOffer extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'telecom_operator_id',
        'telecom_service_type_id',
        'name',
        'short_description',
        'detailed_description',
        'price_per_month',
        'is_postpaid',
        'has_commitment',
        'commitment_duration_months',
        'activation_fee',
        'image_path',
        'available_online',
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

    public function operator(): BelongsTo
    {
        return $this->belongsTo(TelecomOperator::class, 'telecom_operator_id');
    }

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(TelecomServiceType::class, 'telecom_service_type_id');
    }
}
