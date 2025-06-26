<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ScoreValue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function criteria(): BelongsTo
    {
        return $this->belongsTo(ScoreCriteria::class, 'score_criteria_id');
    }

    public function entity(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'vertical_entity_type', 'vertical_entity_id');
    }
}
