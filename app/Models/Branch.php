<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'name',
        'address',
        'city',
        'region',
        'latitude',
        'longitude',
        'opening_hours',
        'services',
        'is_active',
    ];

    protected $casts = [
        'opening_hours' => 'array',
        'services' => 'array',
        'is_active' => 'bool',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
