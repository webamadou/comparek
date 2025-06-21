<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TelecomOffer;

class TelecomOfferSeeder extends Seeder
{
    public function run(): void
    {
        TelecomOffer::truncate();
        TelecomOffer::factory()->count(50)->create();
    }
}
