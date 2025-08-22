<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    /** @use HasFactory<\Database\Factories\AtmFactory> */
    use HasFactory;

    protected $fillable = [
        'bank_id','location_name','address','city','region',
        'latitude','longitude','services','is_24_7','is_active'
    ];

    protected $casts = [
        'services' => 'array',
        'is_24_7' => 'bool',
        'is_active' => 'bool',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
