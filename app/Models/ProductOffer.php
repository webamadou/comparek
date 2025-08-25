<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ProductOffer extends Model
{
    /** @use HasFactory<\Database\Factories\ProductOfferFactory> */
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'bank_product_id','name','slug','description',
        'min_income','min_age','required_documents','eligibility',
        'min_term_months','max_term_months','min_loan_amount','max_loan_amount',
        'effective_from','effective_to','is_active'
    ];

    protected $casts = [
        'required_documents' => 'array',
        'eligibility' => 'array',
        'is_active' => 'bool',
        'effective_from' => 'date',
        'effective_to' => 'date',
        'min_income' => 'decimal:2',
        'min_loan_amount' => 'decimal:2',
        'max_loan_amount' => 'decimal:2',
    ];

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

    public function product()
    {
        return $this->belongsTo(BankProduct::class, 'bank_product_id');
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function fees()
    {
        return $this->hasMany(ProductFee::class);
    }

    public function rates()
    {
        return $this->hasMany(ProductInterestRate::class);
    }
}
