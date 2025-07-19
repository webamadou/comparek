<?php

namespace Database\Seeders;

use App\Models\ProgramDomain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $domains = ['Informatique', 'Droit', 'Santé', 'Gestion', 'Marketing', 'Sciences sociales', 'RH', 'Finance', 'Banque', 'Microfinance', 'Assurances'];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ProgramDomain::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($domains as $name) {
            ProgramDomain::firstOrCreate([
                'name' => $name,
                'slug' => \Str::slug($name),
            ]);
        }
    }
}
