<?php

namespace App\Enums;

enum ProgramLevelEnum: string
{
    case BTS = 'BTS';
    case LICENCE = 'Licence';
    case MASTER = 'Master';
    case MBA = 'MBA';
    case DOCTORAT = 'Doctorat';
    case CERTIFICAT = 'Certificat';

    public static function labels(): array
    {
        return [
            self::BTS->value => 'BTS',
            self::LICENCE->value => 'Licence',
            self::MASTER->value => 'Master',
            self::MBA->value => 'MBA',
            self::DOCTORAT->value => 'Doctorat',
            self::CERTIFICAT->value => 'Certificat',
        ];
    }

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
