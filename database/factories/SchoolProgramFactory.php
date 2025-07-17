<?php

namespace Database\Factories;

use App\Models\ProgramDomain;
use App\Models\School;
use App\Models\SchoolProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolProgram>
 */
class SchoolProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $programs = ProgramDomain::all()->pluck('id')->toArray();
        $schools = School::all()->pluck('id')->toArray();

        return [
            'school_id' => $this->faker->randomElement($schools),
            'name' => 'Licence en ' . $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'level' => $this->faker->randomElement(['Licence', 'Master', 'Doctorat', 'BTS']),
            'program_domain_id' => $this->faker->randomElement($programs),
            'duration_years' => $this->faker->numberBetween(1, 5),
            'modality' => $this->faker->randomElement(['Présentiel', 'Hybride', 'En ligne']),
            'language' => $this->faker->randomElement(['Français', 'Anglais']),
            'is_accredited' => $this->faker->boolean,
            'tuition_fee' => $this->faker->numberBetween(300000, 1200000),
            'tuition_currency' => 'FCFA',
            'tuition_description' => 'Payable en 3 tranches',
        ];
    }

}
