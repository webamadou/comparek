<?php

namespace App;

enum TechnologyEnum: string
{
    case ADSL      = 'adsl';
    case CABLE     = 'cable';
    case FIBER     = 'fiber';
    // case WIRELESS  = 'wireless';
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
            /* self::WIRELESS  => 'Sans-fil', */
            self::FOUR_G => '4G',
            self::FIVE_G => '5G',
        };
    }
}
