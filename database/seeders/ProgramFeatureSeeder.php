<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            'Internship' => 'Stage',
            'Double Degree' => 'Double diplôme',
            'Job Guarantee' => "Garantie d'emploi",
            'Study Abroad' => "Études à l'étranger",
        ];

        foreach ($features as $name => $slug) {
            \App\Models\ProgramFeature::firstOrCreate(['slug' => $slug], ['name' => $name]);
        }

    }
}
