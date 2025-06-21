<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TelecomOfferFeature extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function offer()
    {
        return $this->belongsTo(TelecomOffer::class, 'telecom_offer_id');
    }
}
