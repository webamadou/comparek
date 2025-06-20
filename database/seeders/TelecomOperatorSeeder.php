<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TelecomOperator;

class TelecomOperatorSeeder extends Seeder
{
    public function run(): void
    {
        TelecomOperator::factory()->count(50)->create();
    }
}
