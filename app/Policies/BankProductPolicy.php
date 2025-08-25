<?php

namespace App\Policies;

use App\Models\BankProduct;
use App\Models\User;

class BankProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('bank_product.viewAny') || $user->can('bank_product.view');
    }

    public function view(User $user, BankProduct $bankProduct): bool
    {
        return $user->can('bank_product.view');
    }

    public function create(User $user): bool
    {
        return $user->can('bank_product.create');
    }

    public function update(User $user, BankProduct $bankProduct): bool
    {
        return $user->can('bank_product.update');
    }

    public function delete(User $user, BankProduct $bankProduct): bool
    {
        return $user->can('bank_product.delete');
    }

    public function restore(User $user, BankProduct $bankProduct): bool
    {
        return $user->can('bank_product.restore') || $user->can('bank_product.update');
    }

    public function forceDelete(User $user, BankProduct $bankProduct): bool
    {
        return $user->can('bank_product.forceDelete') || $user->can('bank_product.delete');
    }
}
