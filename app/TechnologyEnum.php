<?php

namespace App;

enum TechnologyEnum: string
{
    case ADSL      = 'adsl';
    case CABLE     = 'cable';
    case FIBER     = 'fiber';
    case BOX       = 'box';
    case FOUR_G = '4g';
    case FIVE_G = '5g';

    /**
     * Libellés humains (utile en vue)
     */
    public function label(): string
    {
        return match($this) {
            self::ADSL      => 'ADSL',
            self::CABLE     => 'Câble',
            self::FIBER     => 'Fibre optique',
            self::BOX       => 'Solution Box',
            self::FOUR_G => '4G',
            self::FIVE_G => '5G',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
