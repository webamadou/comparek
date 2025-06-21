<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TelecomOperator;

class TelecomOperatorSeeder extends Seeder
{
    public function run(): void
    {
        $operators = [
            ['name' => 'Sonatel (Orange Sénégal)', 'description' => 'Filiale du groupe Sonatel, commercialise la fibre, ADSL, 4G/4G+ mobile, box internet « Box Bi », « Flybox »… '],
            ['name' => 'Yas Sénégal (ex‑Free/Tigo)', 'description' => 'Anciennement Tigo puis Free Sénégal, racheté par Axian et renommé Yas en novembre 2024. Propose de l’internet mobile 4G/4G+ et Box 4G pour'],
            ['name' => 'Expresso Sénégal (Groupe Sudatel)', 'description' => 'Fournisseur mobile et internet (CDMA, mobile broadband) actif depuis janvier 2009. A environ 17 % de parts de marché mobile, propose aussi des offres internet '],
        ];

        foreach ($operators as $operator) {
            TelecomOperator::factory()->create($operator);
        }
    }
}
