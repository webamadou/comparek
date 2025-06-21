<?php

namespace Database\Factories;

use App\Models\TelecomServiceType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TelecomServiceTypeFactory extends Factory
{
    protected $model = TelecomServiceType::class;

    public function definition(): array
    {
        $name = $this->faker->word;
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->sentence,
        ];
    }
}
