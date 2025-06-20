<?php

namespace Database\Seeders;

use App\Models\TelecomServiceType;
use Illuminate\Database\Seeder;

class TelecomServiceTypeSeeder extends Seeder
{
    public function run(): void
    {
        TelecomServiceType::factory()->count(20)->create();
    }
}
