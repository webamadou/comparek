<?php

namespace App\Enums;

enum BankCategory: string
{
    case BANK = 'bank';              // Commercial banks
    case EME  = 'eme';               // Electronic money issuer
    case SFD  = 'sfd';               // Decentralized Financial Systems (microfinance)
}
