<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFeatureFactory> */
    use HasFactory;

    protected $fillable = [
        'product_offer_id','key','type','value_string','value_number','value_bool','meta'
    ];

    protected $casts = [
        'value_number' => 'decimal:2',
        'value_bool' => 'bool',
        'meta' => 'array',
    ];

    public function offer()
    {
        return $this->belongsTo(ProductOffer::class, 'product_offer_id');
    }
}
