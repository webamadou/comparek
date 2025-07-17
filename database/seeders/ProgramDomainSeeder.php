<?php

namespace Database\Seeders;

use App\Models\ProgramDomain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $domains = ['Informatique', 'Droit', 'Santé', 'Gestion', 'Marketing', 'Sciences sociales'];

        foreach ($domains as $name) {
            ProgramDomain::firstOrCreate([
                'name' => $name,
                'slug' => \Str::slug($name),
            ]);
        }
    }
}
