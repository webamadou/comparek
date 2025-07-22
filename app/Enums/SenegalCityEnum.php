<?php

namespace App\Enums;

enum SenegalCityEnum: string
{
    case DAKAR = 'Dakar';
    case THIES = 'Thiès';
    case SAINT_LOUIS = 'Saint-Louis';
    case KAOLACK = 'Kaolack';
    case ZIGUINCHOR = 'Ziguinchor';
    case DIOURBEL = 'Diourbel';
    /*case TOUBA = 'Touba';
    case TAMBACOUNDA = 'Tambacounda';
    case KOLDA = 'Kolda';
    case FATICK = 'Fatick';
    case MATAM = 'Matam';
    case LOUGA = 'Louga';
    case KEDOUGOU = 'Kédougou';
    case SEDHIOU = 'Sédhiou';
    case PODOR = 'Podor';
    case RUFISQUE = 'Rufisque';
    case MBOUR = 'Mbour';
    case BIGNONA = 'Bignona';
    case GUEDIAWAYE = 'Guédiawaye';
    case PIKINE = 'Pikine';*/

    public function label(): string
    {
        return $this->value;
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return array_map(fn($case) => ['value' => $case->value, 'label' => $case->label()], self::cases());
    }
}
