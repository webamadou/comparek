<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TelecomOperator;

class TelecomComparison extends Component
{
    public $operators = [];
    public $operatorA = null;
    public $operatorB = null;
    public $offersA = null;
    public $offersB = null;
    public $operatorsAList = [];
    public $operatorsBList = [];
    public $serviceTypes = [];
    public $serviceType = 'internet';
    public $pricePerMonthMin = 25000;
    public $defaultPricePerMonthMax = 25000;
    public $technology = 0;

    public function mount()
    {
        $this->operators = TelecomOperator::all();
        $this->operatorsAList = $this->operators;
        $this->operatorsBList = $this->operators;
        $this->serviceTypes = [
            'internet' => [2, 5],
            'mobile' => [1]
        ];
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
        $this->operatorsAList = $this->operators->map(function ($operator) {
            $operator->disabled = ($operator->id == $this->operatorB);
            return $operator;
        });

        $this->operatorsBList = $this->operators->map(function ($operator) {
            $operator->disabled = ($operator->id == $this->operatorA);
            return $operator;
        });
    }

    public function render()
    {
        $query = TelecomOperator::with('offers', 'images');
        $queryB = $query->clone();

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

        return view(
            'livewire.telecom-comparison',
            compact(
                'operatorDataA',
                'operatorDataB',
            )
        );
    }
}
