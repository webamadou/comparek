<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class TelecomOffer extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'telecom_operator_id',
        'telecom_service_type_id',
        'name',
        'short_description',
        'detailed_description',
        'price_per_month',
        'is_postpaid',
        'has_commitment',
        'commitment_duration_months',
        'activation_fee',
        'image_path',
        'available_online',
    ];

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

    public function operator(): BelongsTo
    {
        return $this->belongsTo(TelecomOperator::class, 'telecom_operator_id');
    }

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(TelecomServiceType::class, 'telecom_service_type_id');
    }

    public function features(): HasMany
    {
        return $this->hasMany(TelecomOfferFeature::class);
    }

    public function scoreValues(): MorphMany
    {
        return $this->morphMany(ScoreValue::class, 'vertical_entity');
    }

    public function averageScore()
    {
        return $this->scoreValues()->avg('value');
    }

    public function weightedScore()
    {
        return $this->scoreValues()
            ->with('criteria')
            ->get()
            ->sum(fn($score) => $score->value * $score->criteria->weight);
    }

    public function getScoresPerCriteriaName($id): array
    {
        $scores = [];
        $scores[] = ScoreCriteria::where('vertical', 'telecom')
            ->get()
            ->map(function ($criteria) {
                ScoreValue::where('score_criteria_id', $criteria->id)
                    ->first();
            });

        return $scores;
    }

    public function currentScore(): float
    {
        // Step 1: Get all relevant criteria for this vertical
        $criteriaList = ScoreCriteria::where('vertical', 'telecom')->get();

        // Step 2: For each criteria, get the latest value for this offer
        $total = 0;
        // $maxTotal = 0;

        foreach ($criteriaList as $criteria) {
            $scoreValue = ScoreValue::where('score_criteria_id', $criteria->id)
                ->where('vertical_entity_type', self::class)
                ->where('vertical_entity_id', $this->id)
                ->latest('created_at')
                ->first();

            if ($scoreValue) {
                $total += ($scoreValue->value * ($criteria->weight / 100));
                // $maxTotal += $criteria->weight; // assuming max value per criteria = 10
            }
        }

       /* if ($maxTotal === 0) {
            return 0;
        }*/
        // Normalize between 0 and 10
        // return round(($total / $maxTotal) * 10, 2);
        return $total;
    }
}
