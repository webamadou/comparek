<?php

namespace App\Policies;

use App\Models\ProductOffer;
use App\Models\User;

class ProductOfferPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('product_offer.viewAny') || $user->can('product_offer.view');
    }

    public function view(User $user, ProductOffer $offer): bool
    {
        return $user->can('product_offer.view');
    }

    public function create(User $user): bool
    {
        return $user->can('product_offer.create');
    }

    public function update(User $user, ProductOffer $offer): bool
    {
        return $user->can('product_offer.update');
    }

    public function delete(User $user, ProductOffer $offer): bool
    {
        return $user->can('product_offer.delete');
    }

    public function restore(User $user, ProductOffer $offer): bool
    {
        return $user->can('product_offer.restore') || $user->can('product_offer.update');
    }

    public function forceDelete(User $user, ProductOffer $offer): bool
    {
        return $user->can('product_offer.forceDelete') || $user->can('product_offer.delete');
    }
}
