<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Traits\BuildsTelecomOfferQuery;
use App\Models\TelecomOperator;

class TelecomComparison extends Component
{
    use BuildsTelecomOfferQuery;

    public $operators = [];
    public $operatorA = null;
    public $operatorB = null;
    public $offersA = null;
    public $offersB = null;
    public $operatorsAList = [];
    public $operatorsBList = [];
    public $serviceTypes = [];
    public $serviceType = 'mobile';
    public $pricePerMonthMin = 100000;
    public $defaultPricePerMonthMax = 100000;
    public $technology = 0;
    public $validityOptions = [];

    public function mount()
    {
        $this->operators = TelecomOperator::all();
        $this->operatorsAList = $this->operators;
        $this->operatorsBList = $this->operators;
        $this->serviceTypes = [
            'internet' => [2, 5],
            'mobile' => [1, 6]
        ];
        $this->validityOptions = [1, 7, 15, 30];
    }

    public function resetFilter()
    {
        $this->reset([
            'pricePerMonthMin',
            'technology',
        ]);
    }

    public function updated()
    {
        if (! empty($this->operatorA)) {
            $this->operatorsBList = $this->operators->transform(function ($operator) {
                if ($operator->id == $this->operatorA) {
                    $operator->disabled = true;
                } else {
                    $operator->disabled = false;
                }
                return $operator;
            });
        }

        if (! empty($this->operatorB)) {
            $this->operatorsAList = $this->operators->transform(function ($operator) {
                if ($operator->id == $this->operatorB) {
                    $operator->disabled = true;
                } else {
                    $operator->disabled = false;
                }
                return $operator;
            });
        }
    }

    public function render()
    {
        $query = TelecomOperator::with('offers', 'images');
        $queryB = $query->clone();

        if ($this->serviceType == 'internet') {
            $this->defaultPricePerMonthMax = 100000;
            $operatorDataA = $this->operatorA ? $query->where('id', $this->operatorA)->first() : null;
            $operatorDataB = $this->operatorB ? $queryB->where('id', $this->operatorB)->first() : null;

            $this->offersA = $operatorDataA
                ?->offers
                ->whereIn('telecom_service_type_id', $this->serviceTypes[$this->serviceType])
                ->when($this->pricePerMonthMin < $this->defaultPricePerMonthMax, fn ($query) => $query->where('price_per_month', '<=', $this->pricePerMonthMin))
                ->when(! empty($this->technology), fn ($query) => $query->where('technology', $this->technology))
                ->all();
            $this->offersB = $operatorDataB
                ?->offers
                ->whereIn('telecom_service_type_id', $this->serviceTypes[$this->serviceType])
                ->when($this->pricePerMonthMin < $this->defaultPricePerMonthMax, fn ($query) => $query->where('price_per_month', '<=', $this->pricePerMonthMin))
                ->when(! empty($this->technology), fn ($query) => $query->where('technology', $this->technology))
                ->all();
        } elseif ($this->serviceType == 'mobile') {
            $this->defaultPricePerMonthMax = 25000;
            $this->offersA = $this->buildQueryByOperator($this->operatorA);
            $this->offersB = $this->buildQueryByOperator($this->operatorB);

            $operatorDataA = $this->offersA->first()?->offer->operator;
            $operatorDataB = $this->offersB->first()?->offer->operator;
        }
 

        return view(
            'livewire.telecom-comparison',
            compact(
                'operatorDataA',
                'operatorDataB',
            )
        );
    }
}
