<?php

namespace App\Models;

use App\Enums\RateType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInterestRate extends Model
{
    /** @use HasFactory<\Database\Factories\ProductInterestRateFactory> */
    use HasFactory;

    protected $fillable = [
        'product_offer_id','rate_type','value_percent','is_fixed','reference_index','spread_percent','conditions'
    ];

    protected $casts = [
        'rate_type' => RateType::class,
        'value_percent' => 'decimal:4',
        'is_fixed' => 'bool',
        'spread_percent' => 'decimal:4',
        'conditions' => 'array',
    ];

    public function offer()
    {
        return $this->belongsTo(ProductOffer::class, 'product_offer_id');
    }
}
