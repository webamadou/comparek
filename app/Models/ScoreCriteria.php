<?php

namespace App\Models;

use App\ComparekEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
