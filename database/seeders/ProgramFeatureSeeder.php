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
            ['name' => "double-competence",              'slug' => 'double_competence',               'is_active' => 1, 'icon_class' => 'bi bi-person-badge'],
            ['name' => "double-degree",                  'slug' => 'double_diplome',                  'is_active' => 1, 'icon_class' => 'bi bi-mortarboard'],
            ['name' => "study-abroad",                   'slug' => 'etudes_a_letranger',              'is_active' => 1, 'icon_class' => 'bi bi-globe'],
            ['name' => "job-guarantee",                  'slug' => 'garantie_demploi',               'is_active' => 1, 'icon_class' => 'bi bi-shield-check'],
            ['name' => "miage-option",                   'slug' => 'option_miage',                    'is_active' => 1, 'icon_class' => 'bi bi-gear'],
            ['name' => "mandatory-internship",           'slug' => 'stage_obligatoire',               'is_active' => 1, 'icon_class' => 'bi bi-briefcase'],
            ['name' => "exchange-semester",              'slug' => 'semestre_dechange',               'is_active' => 1, 'icon_class' => 'bi bi-arrow-left-right'],

            // Academic
            ['name' => "english-courses",                'slug' => 'cours_en_anglais',                'is_active' => 1, 'icon_class' => 'bi bi-translate'],
            ['name' => "work-study-program",             'slug' => 'programme_en_alternance',         'is_active' => 1, 'icon_class' => 'bi bi-calendar2-week'],
            ['name' => "personalized-elective-paths",    'slug' => 'parcours_personnalises_electifs', 'is_active' => 1, 'icon_class' => 'bi bi-sliders'],
            ['name' => "international-partnerships",     'slug' => 'partenariats_internationaux',     'is_active' => 1, 'icon_class' => 'bi bi-people'],
            ['name' => "international-accreditations",   'slug' => 'accreditations_internationales',  'is_active' => 1, 'icon_class' => 'bi bi-award'],
            ['name' => "state-recognized-degree",        'slug' => 'diplome_reconnu_par_letat',       'is_active' => 1, 'icon_class' => 'bi bi-patch-check'],
            ['name' => "project-based-learning",         'slug' => 'pedagogie_par_projet',            'is_active' => 1, 'icon_class' => 'bi bi-kanban'],
            ['name' => "evening-weekend-classes",        'slug' => 'cours_du_soir_weekend',           'is_active' => 1, 'icon_class' => 'bi bi-clock-history'],
            ['name' => "hybrid-format",                  'slug' => 'format_hybride_presentielonline',                  'is_active' => 1, 'icon_class' => 'bi bi-laptop'],
            ['name' => "small-classes-supervision",      'slug' => 'petites_classes_encadrement',     'is_active' => 1, 'icon_class' => 'bi bi-person-lines-fill'],

            // Professionalization
            ['name' => "included-certifications",        'slug' => 'certifications_incluses_cisco_ms_cfa',         'is_active' => 1, 'icon_class' => 'bi bi-patch-check-fill'],
            ['name' => "incubator-entrepreneurship",     'slug' => 'incubateur_entrepreneuriat',      'is_active' => 1, 'icon_class' => 'bi bi-lightbulb'],
            ['name' => "partner-companies",              'slug' => 'entreprises_partenaires',         'is_active' => 1, 'icon_class' => 'bi bi-building'],
            ['name' => "company-visits-learning-trips",  'slug' => 'visites_dentreprises_learning_trips',           'is_active' => 1, 'icon_class' => 'bi bi-bus-front'],
            ['name' => "employment-rate-90-plus",        'slug' => 'taux_demployabilite_90',      'is_active' => 1, 'icon_class' => 'bi bi-graph-up'],

            // Student life / infrastructure
            ['name' => "available-scholarships",         'slug' => 'bourses_detudes_disponibles',                 'is_active' => 1, 'icon_class' => 'bi bi-cash'],
            ['name' => "student-housing",                'slug' => 'logement_etudiant_internat',               'is_active' => 1, 'icon_class' => 'bi bi-house-door'],
            ['name' => "clubs-associations",             'slug' => 'clubs_associations',           'is_active' => 1, 'icon_class' => 'bi bi-people-fill'],
            ['name' => "digital-library",                'slug' => 'bibliotheque_numerique',          'is_active' => 1, 'icon_class' => 'bi bi-book'],
            ['name' => "dedicated-labs-equipment",       'slug' => 'laboratoires_equipements_dedies',            'is_active' => 1, 'icon_class' => 'bi bi-cpu'],
            ['name' => "modern-campus-high-speed-wifi",  'slug' => 'campus_moderne_wifi_haut_debit',             'is_active' => 1, 'icon_class' => 'bi bi-wifi'],
        ];

        foreach ($features as $data) {
            $pf = ProgramFeature::where('slug', $data['slug'])->first();
            if ($pf) {
                $pf->update(['name' => $data['name'], 'is_active' => $data['is_active'], 'icon_class' => $data['icon_class']]);
            } else {
                dd($data['slug']);
            }
            /* ProgramFeature::updateOrCreate(
                ['slug' => $data['slug']],
                ['name' => $data['name'], 'is_active' => $data['is_active'], 'icon_class' => $data['icon_class']]
            ); */
        }
        /*foreach ($features as $name => $slug) {
            \App\Models\ProgramFeature::firstOrCreate(['slug' => $slug], ['name' => $name]);
        }*/
    }
}
