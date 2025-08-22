<?php

namespace App\Policies;

use App\Models\Bank;
use App\Models\User;

class BankPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('bank.viewAny') || $user->can('bank.view');
    }

    public function view(User $user, Bank $bank): bool
    {
        return $user->can('bank.view');
    }

    public function create(User $user): bool
    {
        return $user->can('bank.create');
    }

    public function update(User $user, Bank $bank): bool
    {
        return $user->can('bank.update');
    }

    public function delete(User $user, Bank $bank): bool
    {
        return $user->can('bank.delete');
    }

    public function restore(User $user, Bank $bank): bool
    {
        return $user->can('bank.restore') || $user->can('bank.update');
    }

    public function forceDelete(User $user, Bank $bank): bool
    {
        return $user->can('bank.forceDelete') || $user->can('bank.delete');
    }
}
