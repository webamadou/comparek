<?php
namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    protected $model = School::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'logo_path' => null,
            'description' => $this->faker->sentence,
            'full_description' => $this->faker->paragraph,
            'founding_year' => $this->faker->year,
            'is_accredited' => $this->faker->boolean,
            'accreditation_body' => 'ANAQ-Sup',
            'website_url' => $this->faker->url,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'city' => 'Dakar',
            'country' => 'Sénégal',
            'accepts_foreign_students' => $this->faker->boolean,
            'is_active' => true,
        ];
    }
}
