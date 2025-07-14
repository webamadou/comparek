<?php

namespace Database\Factories;

use App\Enums\ComparekEnum;
use App\Models\ScoreCriteria;
use App\Models\ScoreValue;
use App\Models\TelecomOffer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScoreValue>
 */
class ScoreValueFactory extends Factory
{
    protected $model = ScoreValue::class;

    public function definition(): array
    {
        $criteria = ScoreCriteria::factory()->create(['vertical' => ComparekEnum::TELECOM]);
        $offer = TelecomOffer::factory()->create();

        return [
            'score_criteria_id' => $criteria->id,
            'vertical_entity_type' => TelecomOffer::class,
            'vertical_entity_id' => $offer->id,
            'value' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
