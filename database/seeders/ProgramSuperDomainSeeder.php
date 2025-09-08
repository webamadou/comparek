<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSuperDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $domains = [
            ['name' => 'banking_finance_insurance', 'slug' => 'banque_finance_assurance', ],
            ['name' => 'administration_governance', 'slug' => 'administration_gouvernance', ],
            ['name' => 'management_strategy', 'slug' => 'management_strategie', ],
            ['name' => 'it_development', 'slug' => 'informatique_developpement', ],
            ['name' => 'data_ai_cybersecurity', 'slug' => 'data_ia_cybersecurite', ],
            ['name' => 'marketing_business_communication', 'slug' => 'marketing_commerce_communication', ],
            ['name' => 'law_international_relations', 'slug' => 'droit_relations_internationales', ],
            ['name' => 'economics_applied_mathematics', 'slug' => 'economie_mathematiques_appliquees', ],
            ['name' => 'engineering_sciences', 'slug' => 'ingenierie_sciences', ],
            ['name' => 'energy_environment_sustainable_development', 'slug' => 'energie_environnement_developpement_durable', ],
            ['name' => 'agriculture_health', 'slug' => 'agro_sante', ],
            ['name' => 'transport_logistics', 'slug' => 'transport_logistique', ],
            ['name' => 'tourism_hospitality', 'slug' => 'tourisme_hotellerie', ],
            ['name' => 'entrepreneurship_innovation', 'slug' => 'entrepreneuriat_innovation', ],
            ['name' => 'quality_safety', 'slug' => 'qualite_securite', ],
        ];

        foreach ($domains as $domain) {
            DB::table('program_super_domains')->insert([
                'name' => $domain['name'],
                'slug' => $domain['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
