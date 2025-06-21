<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TelecomOffer>
 */
class TelecomOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'telecom_operator_id' => \App\Models\TelecomOperator::factory(),
            'telecom_service_type_id' => \App\Models\TelecomServiceType::factory(),
            'name' => $this->faker->sentence(3),
            'short_description' => $this->faker->sentence,
            'detailed_description' => $this->faker->paragraph,
            'price_per_month' => $this->faker->randomFloat(2, 10, 100),
            'is_postpaid' => $this->faker->boolean,
            'has_commitment' => $this->faker->boolean,
            'commitment_duration_months' => $this->faker->optional()->numberBetween(1, 24),
            'activation_fee' => $this->faker->optional()->randomFloat(2, 0, 50),
            'image_path' => null,
            'available_online' => $this->faker->boolean,
        ];
    }
}
