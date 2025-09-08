<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramDomainUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapping = [
            'Banque, Finance & Assurance' => [
                'Banque',
                'Finance',
                'Finance & Gestion des Risques',
                'Finance d’entreprise',
                'Finance islamique',
                'Fiscalité',
                'Marchés financiers',
                'Microfinance',
                'Monétique',
                'Audit',
                'Assurances',
                'Comptabilité',
                'Contrôle de gestion',
                'Gestion financière',
                'Risques',
            ],

            'Administration & Gouvernance' => [
                'Administration d’entreprise',
                'Administration des Affaires',
                'Administration publique',
                'Gestion publique',
                'Gouvernance',
                'Conformité',
                'Conformité Shariah',
                'Gestion de la conformité',
                'Politiques publiques',
                'Partenariat public-privé',
                'Marchés publics',
            ],

            'Management & Stratégie' => [
                'Gestion',
                'Gestion d’entreprise',
                'Gestion des projets',
                'Gestion de projets techniques',
                'Gestion des risques',
                'Management',
                'Management à distance',
                'Management d’équipe',
                'Management de projets',
                'Management durable',
                'Management international',
                'Management opérationnel',
                'Management public',
                'Management stratégique',
                'Stratégie',
                'Stratégie digitale',
                'Planification',
                'RH',
                'Immobilier',
            ],

            'Informatique & Développement' => [
                'Informatique',
                'Informatique / Gestion',
                'Informatique & Réseaux',
                'Informatique appliquée à la gestion (MIAGE)',
                'Informatique décisionnelle',
                'Développement',
                'Développement web',
                'Développement web & mobile',
                'Génie Logiciel',
                'Réseaux',
                'Télécom',
                'Digital', // terme générique côté tech (distinct de "Marketing digital")
            ],

            'Data, IA & Cybersécurité' => [
                'Big Data',
                'Data analysis',
                'Data Science',
                'Intelligence Artificielle',
                'Cybersécurité',
                'Cloud Computing',
                // Gérer les deux variantes ci-dessous :
                'Systèmes embarqués',
                'Numérique',
                'Technologies financières',
                'Technologies numériques',
                'Systèmes d\'information',
                "Systèmes d'information", // au cas où la base contiendrait les guillemets
            ],

            'Marketing, Commerce & Communication' => [
                'Business',
                'Business analysis',
                'Commerce',
                'Commerce international',
                'CRM',
                'Développement commercial',
                'Distribution',
                'E-Marketing',
                'Études de marché',
                'Marketing',
                'Marketing digital',
                'Marketing sportif',
                'Marketing stratégique',
                'Responsables marketing',
                'Communication',
                'Médias',
                'Influence',
                'Journalisme',
                'Vente',
                'Sport business',
            ],

            'Droit & Relations internationales' => [
                'Droit',
                'Droit des affaires',
                'Droit fiscal',
                'Droit privé',
                'Droit public',
                'Notariat',
                'Relations internationales',
                'Coopération internationale',
                'International',
            ],

            'Économie & Mathématiques appliquées' => [
                'Actuariat',
                'Économie',
                'Économie appliquée',
                'Économie islamique',
                'Économie Sociale et Solidaire',
                'Mathématiques appliquées',
                'Statistique',
                'Statistiques appliquées',
                'Science politique',
                'Sciences sociales',
            ],

            'Ingénierie & Sciences' => [
                'BTP',
                'Génie civil',
                'Ingénierie',
                'Électronique',
                'Géosciences',
                'Géopolitique énergétique',
            ],

            'Énergie, Environnement & Développement durable' => [
                'Énergie',
                'Environnement',
                'Développement durable',
                'RSE',
            ],

            'Agro & Santé' => [
                'Agro-business',
                'Agroalimentaire',
                'Pharmacie',
                'Programmes sanitaires',
                'Santé',
            ],

            'Transport & Logistique' => [
                'Logistique',
                'Logistique urbaine',
                'Mobilité urbaine',
                'Exploitation de systèmes de transport',
                'Supply chain',
                'Transport',
                'Transport durable',
            ],

            'Tourisme & Hôtellerie' => [
                'Tourisme',
            ],

            'Entrepreneuriat & Innovation' => [
                'Entrepreneurship ', // avec espace insécable
                'Entrepreneurship', // variante sans espace insécable si besoin
                'Développement personnel',
                'Formation',
            ],

            'Qualité & Sécurité' => [
                'QHSE',
                'Qualité',
            ],
        ];

        foreach ($mapping as $superDomain => $subDomains) {
            $superDomainId = DB::table('program_super_domains')->where('name', $superDomain)->value('id');

            foreach ($subDomains as $domain) {
                DB::table('program_domains')
                    ->where('name', $domain)
                    ->update(['super_domain_id' => $superDomainId]);
            }
        }
    }
}
