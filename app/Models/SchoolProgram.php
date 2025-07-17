<?php

namespace App\Models;

use App\Enums\ProgramLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolProgram extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolProgramFactory> */
    use HasFactory;

    protected $casts = [
        'level' => ProgramLevelEnum::class,
        'is_accredited' =>  'boolean',
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function domain(): BelongsTo
    {
        return $this->belongsTo(ProgramDomain::class);
    }
}
