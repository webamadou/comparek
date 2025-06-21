<?php

namespace Database\Seeders;

use App\Models\TelecomServiceType;
use Illuminate\Database\Seeder;

class TelecomServiceTypeSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Mobile', 'Internet', 'TV', 'Forfait'] as $service_type) {
            TelecomServiceType::factory()->create(['name' => $service_type, 'description' => '-']);
        }
    }
}
