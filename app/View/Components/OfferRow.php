<?php

namespace App\View\Components;

use App\Models\TelecomOffer;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OfferRow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public TelecomOffer $offer)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.offer-row');
    }
}
