<?php

namespace Database\Factories;

use App\Models\TelecomOffer;
use App\Models\TelecomOfferFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

class TelecomOfferFeatureFactory extends Factory
{
    protected $model = TelecomOfferFeature::class;

    public function definition(): array
    {
        $featureName = $this->faker->randomElement(['data_volume', 'voice_minutes', 'sms', 'speed', 'tv_channels']);
        $unitMap = [
            'data_volume' => ['MB', 'GB'],
            'voice_minutes' => ['minutes'],
            'sms' => ['messages'],
            'speed' => ['Mbps'],
            'tv_channels' => ['channels'],
        ];
        $unit = $this->faker->randomElement($unitMap[$featureName]);

        return [
            'telecom_offer_id' => TelecomOffer::factory(),
            'name' => $featureName,
            'value' => $this->faker->randomNumber(3),
            'unit' => $unit,
            'is_highlighted' => $this->faker->boolean,
        ];
    }
}
