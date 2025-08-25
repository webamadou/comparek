<?php

namespace App\Enums;

enum ProductType: string {
    case CURRENT_ACCOUNT   = 'current_account';
    case SAVINGS_ACCOUNT   = 'savings_account';
    case FIXED_DEPOSIT     = 'fixed_deposit';
    case BUSINESS_ACCOUNT  = 'business_account';

    case CONSUMER_LOAN     = 'consumer_loan';
    case MORTGAGE_LOAN     = 'mortgage_loan';
    case AUTO_LOAN         = 'auto_loan';
    case SME_LOAN          = 'sme_loan';

    case DEBIT_CARD        = 'debit_card';
    case CREDIT_CARD       = 'credit_card';
    case PREPAID_CARD      = 'prepaid_card';

    case DIGITAL_BANKING   = 'digital_banking'; // pack/app/service digital
}
