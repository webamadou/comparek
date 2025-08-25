<?php

namespace App\Enums;

enum FeeType: string {
    case ACCOUNT_OPENING           = 'account_opening';
    case ACCOUNT_MAINTENANCE       = 'account_maintenance';
    case CARD_ISSUANCE             = 'card_issuance';
    case CARD_ANNUAL               = 'card_annual';
    case ATM_WITHDRAW_SAME_BANK    = 'atm_withdraw_same_bank';
    case ATM_WITHDRAW_OTHER_BANK   = 'atm_withdraw_other_bank';
    case ATM_WITHDRAW_INTERNATIONAL= 'atm_withdraw_international';
    case TRANSFER_INTRA_BANK       = 'transfer_intra_bank';
    case TRANSFER_INTERBANK_DOM    = 'transfer_interbank_domestic';
    case TRANSFER_INTERNATIONAL    = 'transfer_international';
    case INTERNET_BANKING          = 'internet_banking';
    case MOBILE_BANKING            = 'mobile_banking';
    case USSD_SERVICE              = 'ussd_service';
    case SMS_ALERTS                = 'sms_alerts';
    case CASH_WITHDRAW_TELLER      = 'cash_withdraw_teller';
    case CASH_DEPOSIT              = 'cash_deposit';
    case CHECKBOOK                 = 'checkbook';
    case OVERDRAFT_COMMISSION      = 'overdraft_commission';
    case LOAN_FILE                 = 'loan_file_fee';
    case EARLY_REPAYMENT_PENALTY   = 'early_repayment_penalty';
    case INSURANCE_PREMIUM         = 'insurance_premium';
}
