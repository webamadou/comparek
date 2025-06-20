<?php

namespace Database\Factories;

use App\Models\TelecomOperator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TelecomOperatorFactory extends Factory
{
    protected $model = TelecomOperator::class;

    public function definition(): array
    {
        $name = $this->faker->company;
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'logo_path' => null, // You can customize for logo uploads later
            'website_url' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'headquarters_location' => $this->faker->city,
            'established_year' => $this->faker->year,
            'is_active' => $this->faker->boolean,
        ];
    }
}
