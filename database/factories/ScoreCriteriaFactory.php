<?php

namespace Database\Factories;

use App\Enums\ComparekEnum;
use App\Models\ScoreCriteria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScoreCriteria>
 */
class ScoreCriteriaFactory extends Factory
{
    protected $model = ScoreCriteria::class;

    public function definition(): array
    {
        return [
            'vertical' => $this->faker->randomElement(ComparekEnum::values()),
            'name' => $this->faker->word,
            'weight' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
