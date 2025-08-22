<?php

namespace App\Models;

use App\Enums\FeeType;
use App\Enums\FeeUnit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFee extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFeeFactory> */
    use HasFactory;

    protected $fillable = [
        'product_offer_id','fee_type','unit','amount','percentage','min_amount','max_amount','conditions'
    ];

    protected $casts = [
        'fee_type' => FeeType::class,
        'unit' => FeeUnit::class,
        'amount' => 'decimal:2',
        'percentage' => 'decimal:4',
        'min_amount' => 'decimal:2',
        'max_amount' => 'decimal:2',
        'conditions' => 'array',
    ];

    public function offer() { return $this->belongsTo(ProductOffer::class, 'product_offer_id'); }
}
