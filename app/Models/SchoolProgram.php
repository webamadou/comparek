<?php

namespace App\Models;

use App\Enums\ProgramLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class SchoolProgram extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolProgramFactory> */
    use HasFactory;
    use HasSlug;

    protected $guarded = [];

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

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function accreditationBodies()
    {
        return $this->belongsToMany(AccreditationBody::class, 'accreditation_programs')
            ->withPivot('status', 'accreditation_date', 'expiration_date', 'notes')
            ->withTimestamps();
    }

    public function features()
    {
        return $this->belongsToMany(ProgramFeature::class);
    }
}
