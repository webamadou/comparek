<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TelecomOfferFeature extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'data_volume_value' => 'float',
    ];

    public function offer()
    {
        return $this->belongsTo(TelecomOffer::class, 'telecom_offer_id');
    }
}
