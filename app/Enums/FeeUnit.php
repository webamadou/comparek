<?php

namespace App\Enums;

enum FeeUnit: string {
    case PER_OPERATION = 'per_operation';
    case PER_MONTH     = 'per_month';
    case PER_YEAR      = 'per_year';
    case PERCENT       = 'percent';
}
