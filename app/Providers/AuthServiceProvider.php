<?php

namespace App\Providers;

use App\Models\Bank;
use App\Models\BankProduct;
use App\Models\ProductOffer;
use App\Policies\BankPolicy;
use App\Policies\BankProductPolicy;
use App\Policies\ProductOfferPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Bank::class         => BankPolicy::class,
        BankProduct::class  => BankProductPolicy::class,
        ProductOffer::class => ProductOfferPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
