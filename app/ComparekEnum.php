<?php

namespace App;

enum ComparekEnum: string
{
    case TELECOM = 'telecom';
    case SCHOOL = 'school';
    case BANK = 'bank';
    case INSURANCE = 'insurance';

    // Helper (optional)
    public function label(): string
    {
        return match($this) {
            self::TELECOM => 'Box & Mobile',
            self::SCHOOL => 'École',
            self::BANK => 'Banque',
            self::INSURANCE => 'Assurance',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
