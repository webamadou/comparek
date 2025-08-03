<?php

namespace App\Enums;

enum ProgramLevelEnum: string
{
    case BAC = 'BAC';
    case BTS = 'BTS';
    case LICENCE = 'Licence';
    case MASTERUN = 'Master';
    case MASTERDEUX = 'Master 2';
    case MBA = 'MBA';
    case DOCTORAT = 'Doctorat';
    case CERTIFICAT = 'Certificat';

    public static function labels(): array
    {
        return [
            self::BAC->value => 'BAC',
            self::BTS->value => 'BTS',
            self::LICENCE->value => 'Licence',
            self::MASTERUN->value => 'Master 1',
            self::MASTERDEUX->value => 'Master 2',
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
