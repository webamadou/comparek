<?php

namespace App\Enums;

enum RateType: string {
    case NOMINAL = 'nominal';
    case APR     = 'apr';         // TEG/TAEG
    case EFFECTIVE = 'effective';
}
