<?php

namespace App\Enums;

enum LanguageEnum: string
{
    case FRENCH = 'Français';
    case ENGLISH = 'Anglais';
    case BILINGUAL = 'Bilingue';

    public static function labels(): array
    {
        return [
            self::FRENCH->value => 'Français',
            self::ENGLISH->value => 'Anglais',
            self::BILINGUAL->value => 'Bilingue',
        ];
    }

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
