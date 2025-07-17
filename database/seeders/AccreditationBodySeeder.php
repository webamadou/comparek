<?php

namespace Database\Seeders;

use App\Models\AccreditationBody;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccreditationBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodies = [
            ['ANAQ-Sup', 'https://anaqsup.sn', true],
            ['CAMES', 'https://www.lecames.org', true],
            ['ISO 9001', null, false],
            ['ACBSP', 'https://acbsp.org', true],
            ['ABET', 'https://abet.org', true],
            ['AMBA', 'https://www.associationofmbas.com', true],
            ['EQUIS', 'https://www.efmdglobal.org/accreditations/business-schools/equis', true],
            ['AACSB', 'https://www.aacsb.edu', true],
        ];

        foreach ($bodies as [$name, $url, $active]) {
            AccreditationBody::updateOrCreate([
                'slug' => \Str::slug($name),
            ], [
                'name' => $name,
                'website_url' => $url,
                'is_active' => $active,
            ]);
        }
    }
}
