<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Traits\BuildsTelecomOfferQuery;
use App\Models\TelecomOperator;
use App\Models\TelecomOffer;

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
    public $technology = [];
    public $validityOptions = [];

    // Properties (initial ranges)
    public array $internetPriceRange      = [0, 60000];
    public array $priceRange = [0, 20000];
    public array $dataRange       = [0, 102400];   // Mo
    public array $minutesRange    = [0, 1000];
    public array $smsRange        = [0, 1000];
    public array $creditRange     = [1000, 10000];

    // Listen to browser events
    protected $listeners = [
        'internetPriceRangeChanged'   => 'setInternetPriceRange',
        'priceRangeChanged'   => 'setPriceRange',
        'dataRangeChanged'    => 'setDataRange',
        'minutesRangeChanged' => 'setMinutesRange',
        'smsRangeChanged'     => 'setSmsRange',
        'creditRangeChanged'  => 'setCreditRange',
    ];

    public function setPriceRange(int $min, int $max): void
    {
        $this->priceRange = [$min, $max];
    }

    public function setInternetPriceRange(int $min, int $max): void
    {
        $this->internetPriceRange = [$min, $max];
    }

    public function setDataRange(int $min, int $max): void
    {
        $this->dataRange = [$min, $max];
    }

    public function setMinutesRange(int $min, int $max): void
    {
        $this->minutesRange = [$min, $max];
    }

    public function setSmsRange(int $min, int $max): void
    {
        $this->smsRange = [$min, $max];
    }

    public function setCreditRange(int $min, int $max): void
    {
        $this->creditRange = [$min, $max];
    }


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

    public function resetTheFilter()
    {
        // Reset properties first
        $this->reset([
            'operator',
            'validityLength',
            'data',
            'voiceMinutes',
            'sms_nbr',
            'phoneCredit',
            'price',
            'mobilePricePerMonthMin',
            'sortBy',
            'orderDirection',
            'score',
            'technology',
        ]);

        // Reset ranges
        $this->priceRange   = [0, 10000];
        $this->internetPriceRange   = [0, 60000];
        $this->dataRange    = [0, 102400];
        $this->minutesRange = [0, 1000];
        $this->smsRange     = [0, 1000];
        $this->creditRange  = [1000, 10000];

        // Then dispatch events to update sliders (server → client)
        $this->dispatch('priceRangeChanged:set', $this->priceRange);
        $this->dispatch('internetPriceRangeChanged:set', $this->internetPriceRange);
        $this->dispatch('dataRangeChanged:set', $this->dataRange);
        $this->dispatch('minutesRangeChanged:set', $this->minutesRange);
        $this->dispatch('smsRangeChanged:set', $this->smsRange);
        $this->dispatch('creditRangeChanged:set', $this->creditRange);
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
            $operatorDataA = $this->operatorA ? TelecomOperator::where('id', $this->operatorA)->first() : null;
            $operatorDataB = $this->operatorB ? TelecomOperator::where('id', $this->operatorB)->first() : null;

            $this->offersA = TelecomOffer::where('telecom_operator_id', $operatorDataA?->id)
                ?->when($this->internetPriceRange[0] > 0 || $this->internetPriceRange[1] < 50000, function ($query) {
                    return $query->whereBetween('price_per_month', $this->internetPriceRange);
                })
                ->when(! empty($this->technology), fn ($query) => $query->whereIn('technology', $this->technology))
                ->get();
            $this->offersB = TelecomOffer::where('telecom_operator_id', $operatorDataB?->id)
                ?->whereIn('telecom_service_type_id', $this->serviceTypes[$this->serviceType])
                ->when($this->internetPriceRange[0] > 0 || $this->internetPriceRange[1] < 50000, function ($query) {
                    return $query->whereBetween('price_per_month', $this->internetPriceRange);
                })
                ->when(! empty($this->technology), fn ($query) => $query->whereIn('technology', $this->technology))
                ->get();
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
