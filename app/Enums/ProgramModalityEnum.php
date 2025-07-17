<?php

namespace App\Enums;

enum ProgramModalityEnum: string
{
    case INPERSON = 'Présentiel';
    case ONLINE = 'En ligne';
    case HYBRIDE = 'Hybride';

    public static function labels(): array
    {
        return [
            self::INPERSON->value => 'Présentiel',
            self::ONLINE->value => 'En Ligne',
            self::HYBRIDE->value => 'Hybride',
        ];
    }

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
