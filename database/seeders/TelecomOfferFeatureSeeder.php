<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TelecomOfferFeature;

class TelecomOfferFeatureSeeder extends Seeder
{
    public function run(): void
    {
        TelecomOfferFeature::factory()->count(100)->create();
    }
}
