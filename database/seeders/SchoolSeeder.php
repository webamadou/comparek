<?php
namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        School::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $schools = [
            // CESAG
            ['name'=>"Centre Africain d'Etudes Supérieures en Gestion (CESAG)",
                'founding_year'=>1978,
                'accreditation_body'=>'CAMES',
                'website_url'=>'https://www.cesag.sn',
                'email'=>'courrier@cesag.sn',
                'phone'=>'33 839 73 60',
                'address'=>'Bd Général De Gaulle x Malick Sy, Dakar',
                'accepts_foreign_students'=>true,'is_active'=>true ],
            // BCEAO
            [
                'name'=>'Centre Ouest Africain de Formation et d\'Etudes Bancaires – BCEAO',
                'founding_year'=>null,
                'accreditation_body'=>'CAMES',
                'website_url'=>'https://www.bceao.int',
                'email'=>null,'phone'=>null,
                'address'=>'Dakar',
                'accepts_foreign_students'=>true,'is_active'=>false
            ],
            // IPD
            ['name'=>'Institut Polytechnique de Dakar (IPD)',
                'founding_year'=>1991,'accreditation_body'=>'CAMES',
                'website_url'=>'https://www.ipd.sn','email'=>null,'phone'=>'+221 33 867 90 45',
                'address'=>'Sud Foire n°84‑77, Dakar','accepts_foreign_students'=>true,'is_active'=>false],
            // ISDD
            ['name'=>'Institut Supérieur de Droit de Dakar (ISDD)',
                'founding_year'=>null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true,'is_active'=>false],
            // ESTM
            ['name'=>'Ecole Supérieure de Technologie et de Management de Dakar (ESTM)',
                'founding_year'=>null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true,'is_active'=>false],
            // ESP
            ['name'=>'Ecole Supérieure d\'Électricité, du Bâtiment et des Travaux Publics',
                'founding_year'=>1964,'accreditation_body'=>'CAMES',
                'website_url'=>'http://www.esp.sn','email'=>'esp@esp.sn','phone'=>'+221 33 824 05 40',
                'address'=>'Corniche Ouest BP 5085 Dakar‑Fann','accepts_foreign_students'=>true,'is_active'=>true],
            // EUROMED
            ['name'=>'EUROMED UNIVERSITÉ',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true,'is_active'=>false],
            // Hamadou Hampaté Bâ
            ['name'=>'Université Hamadou Hampâté Bâ – Dakar',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true,'is_active'=>false],
            // Groupe ESC Dakar
            ['name'=>'Groupe Ecole supérieure de commerce de Dakar',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>true],
            // ISM
            ['name'=>'Institut Supérieur en Management (ISM) Dakar',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>true],
            // ISI
            ['name'=>'Institut Supérieur d\'Informatique (ISI) de Dakar',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>true],
            // El Hadji Ibrahima Niasse
            ['name'=>'Université El Hadji Ibrahima Niasse',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>false],
            // BeM Dakar
            ['name'=>'BeM – Dakar Bordeaux Management School – Fann',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>true],
            // CENTRE TRAINMAR
            ['name'=>'CENTRE TRAINMAR',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>false],
            // IFM Enseignement
            ['name'=>'Institut de Formation aux Métiers de l\'Enseignement',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>false],
            // ESMT
            ['name'=>'Ecole Supérieure Multinationale des Télécommunications',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>true],
            // IFAGE
            ['name'=>'Institut Interafricain de Formation en Assurances et Gestion des Entreprises (IFAGE)',
                'founding_year'=>2008,'accreditation_body'=>'CAMES',
                'website_url'=>'https://ifage.net','email'=>null,'phone'=>null,
                'address'=>'Liberté 6 extension, VDN 04, Dakar','accepts_foreign_students'=>true, 'is_active'=>false],
            // IAM
            ['name'=>'Institut Africain de Management (IAM)',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>true],
            // EMD
            ['name'=>'Ecole de Management de Dakar',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>false],
            // Université de l’Entreprise
            ['name'=>'Université de l\'Entreprise / Dakar',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>false],
            // IPFORMED
            ['name'=>'Institut privé de formation et de recherches médicales post bac',
                'founding_year'=> null,'accreditation_body'=>'CAMES',
             'website_url'=>null,'email'=>null,'phone'=>null,
             'address'=>'Dakar','accepts_foreign_students'=>true, 'is_active'=>false],
            // UCAO
            [
                'name' => "Complexe Saint‑Michel – UCAO (Collège & Institut Supérieur)",
                'slug' => 'complexe_saint_michel_ucao',
                'description' => "Centre pédagogique catholique à Dakar, partie intégrante du réseau UCAO.",
                'full_description' => "Le Complexe Saint-Michel regroupe le collège et l’Institut Supérieur de Gestion, rattaché à l’Université Catholique de l’Afrique de l’Ouest (UCAO). Il offre des formations de la licence au BTS dans un cadre humaniste.",
                'founding_year' => 1967,
                'is_accredited' => true,
                'website_url' => 'https://www.st-michel.sn',
                'email' => 'stmichel@ucao.edu.sn',
                'phone' => '+221 33 823 08 40',
                'address' => '17, rue Saint‑Michel, BP 3402',
                'city' => 'Dakar',
                'country' => 'Sénégal',
                'accepts_foreign_students' => true,
                'is_active' => true,
            ]
        ];

        foreach ($schools as $data) {
            School::create(array_merge([
                'logo_path'=>null,'description'=>fake()->sentence,'full_description'=>fake()->paragraph,
                'is_accredited'=>true,'is_active'=>true,'country'=>'Sénégal','city'=>'Dakar',
            ], $data));
        }
    }
}
