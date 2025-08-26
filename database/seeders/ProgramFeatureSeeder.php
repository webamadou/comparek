<?php

namespace Database\Seeders;

use App\Models\ProgramFeature;
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
            ['name' => "Double compétence",              'slug' => 'double-competence',               'is_active' => 1],
            ['name' => "Double diplôme",                 'slug' => 'double-diplome',                  'is_active' => 1],
            ['name' => "Études à l’étranger",            'slug' => 'etudes-a-letranger',              'is_active' => 1],
            ['name' => "Garantie d’emploi",              'slug' => 'garantie-d-emploi',               'is_active' => 1],
            ['name' => "Option MIAGE",                   'slug' => 'option-miage',                    'is_active' => 1],
            ['name' => "Stage obligatoire",              'slug' => 'stage-obligatoire',               'is_active' => 1],
            ['name' => "Semestre d’échange",             'slug' => 'semestre-dechange',               'is_active' => 1],

            // Académiques
            ['name' => "Cours en anglais",               'slug' => 'cours-en-anglais',                'is_active' => 1],
            ['name' => "Programme en alternance",        'slug' => 'programme-en-alternance',         'is_active' => 1],
            ['name' => "Parcours personnalisés / électifs",'slug'=> 'parcours-personnalises-electifs', 'is_active' => 1],
            ['name' => "Partenariats internationaux",    'slug' => 'partenariats-internationaux',     'is_active' => 1],
            ['name' => "Accréditations internationales", 'slug' => 'accreditations-internationales',  'is_active' => 1],
            ['name' => "Diplôme reconnu par l’État",     'slug' => 'diplome-reconnu-par-letat',       'is_active' => 1],
            ['name' => "Pédagogie par projet",           'slug' => 'pedagogie-par-projet',            'is_active' => 1],
            ['name' => "Cours du soir / week‑end",       'slug' => 'cours-du-soir-weekend',           'is_active' => 1],
            ['name' => "Format hybride (présentiel/online)", 'slug' => 'format-hybride',             'is_active' => 1],
            ['name' => "Petites classes / encadrement",  'slug' => 'petites-classes-encadrement',     'is_active' => 1],

            // Professionnalisation
            ['name' => "Certifications incluses (Cisco, MS, CFA…)", 'slug' => 'certifications-incluses', 'is_active' => 1],
            ['name' => "Incubateur / entrepreneuriat",   'slug' => 'incubateur-entrepreneuriat',      'is_active' => 1],
            ['name' => "Entreprises partenaires",        'slug' => 'entreprises-partenaires',         'is_active' => 1],
            ['name' => "Visites d’entreprises / learning trips", 'slug' => 'visites-d-entreprises',   'is_active' => 1],
            ['name' => "Taux d’employabilité > 90%",     'slug' => 'taux-employabilite-90-plus',      'is_active' => 1],

            // Vie étudiante / infrastructures
            ['name' => "Bourses d’études disponibles",   'slug' => 'bourses-detudes',                 'is_active' => 1],
            ['name' => "Logement étudiant / internat",   'slug' => 'logement-etudiant',               'is_active' => 1],
            ['name' => "Clubs & associations",           'slug' => 'clubs-et-associations',           'is_active' => 1],
            ['name' => "Bibliothèque numérique",         'slug' => 'bibliotheque-numerique',          'is_active' => 1],
            ['name' => "Laboratoires / équipements dédiés", 'slug' => 'laboratoires-equipes',        'is_active' => 1],
            ['name' => "Campus moderne / wifi haut débit",'slug' => 'campus-moderne-wifi',            'is_active' => 1],
        ];

        foreach ($features as $data) {
            ProgramFeature::updateOrCreate(
                ['name' => $data['name']],
                ['name' => $data['name'], 'is_active' => $data['is_active']]
            );
        }
        /*foreach ($features as $name => $slug) {
            \App\Models\ProgramFeature::firstOrCreate(['slug' => $slug], ['name' => $name]);
        }*/

    }
}
