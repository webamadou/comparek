<?php

namespace App\Models;

use App\ComparekEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScoreCriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'vertical',
        'name',
        'weight',
    ];

    protected $casts = [
        'vertical' => ComparekEnum::class,
    ];

    public function scoreValue(): HasMany
    {
        return $this->hasMany(ScoreValue::class);
    }
}
