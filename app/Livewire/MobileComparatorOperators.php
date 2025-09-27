<?php

namespace App\Livewire;

use App\Enums\ScoreGrade;
use App\Livewire\Traits\BuildsTelecomOfferQuery;
use App\Models\TelecomOfferFeature;
use App\Models\TelecomOperator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Livewire\Component;
use Livewire\WithPagination;

class MobileComparatorOperators extends Component
{
    use BuildsTelecomOfferQuery;

    public $operators = '';
    public $validityOptions = [];
    public $scores = '';
    public $technology = [];
    public $data_unit = '';
    public $filterIsVisible = false;

    // Properties (initial ranges)
    public array $priceRange      = [0, 10000];
    public array $dataRange       = [0, 102400];   // Mo
    public array $minutesRange    = [0, 1000];
    public array $smsRange        = [0, 1000];
    public array $creditRange     = [1000, 10000];

    // Listen to browser events
    protected $listeners = [
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


    public function resetFilter()
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
        ]);

        // Reset ranges
        $this->priceRange   = [0, 10000];
        $this->dataRange    = [0, 2048];
        $this->minutesRange = [0, 1000];
        $this->smsRange     = [0, 1000];
        $this->creditRange  = [1000, 10000];

        // Then dispatch events to update sliders (server → client)
        $this->dispatch('priceRangeChanged:set', $this->priceRange);
        $this->dispatch('dataRangeChanged:set', $this->dataRange);
        $this->dispatch('minutesRangeChanged:set', $this->minutesRange);
        $this->dispatch('smsRangeChanged:set', $this->smsRange);
        $this->dispatch('creditRangeChanged:set', $this->creditRange);

        // Force page reload to reset sliders
        $this->js('setTimeout(() => window.location.reload(), 100)');
    }

    public function mount()
    {
        $this->operators = TelecomOperator::all();
        $this->scores = ScoreGrade::cases();
        $this->validityOptions = [1, 7, 15, 30];
    }

    public function updating($property)
    {
        /*if ($property !== 'sortBy' && $property !== 'sortDirection') {
            $this->resetPage();
        }*/
    }

    public function updated()
    {
        $this->js('window.scrollToElement(\'list-operators\')');
        $this->filterIsVisible = false;
    }

    public function toggleFilter()
    {
        $this->filterIsVisible = ! $this->filterIsVisible;
    }

    public function resetField($field)
    {
        $this->reset($field);
    }

    public function resetFilter__()
    {
        $this->js('window.location.reload()');
    }

    protected function generateCacheKey(): string
    {
        return 'mobile_comparator_' . md5(json_encode([
                'operator' => $this->operator,
                'validityLength' => $this->validityLength,
                'data' => implode('-', $this->dataRange),
                'voiceMinutes' => implode('-', $this->minutesRange),
                'sms_nbr' => implode('-', $this->smsRange),
                'phoneCredit' => implode('-', $this->creditRange),
                'price' => implode('-', $this->priceRange),
                'score' => $this->score,
                'sortBy' => $this->sortBy,
                'orderDirection' => $this->orderDirection,
            ]));
    }

    public function render()
    {
        $cacheKey = $this->generateCacheKey();

        $telecomOffers = Cache::remember($cacheKey.'v1.2', Config::get('cache.duration'), function () {
            return $this->buildMobileQueryOffer()->all();
        });

        return view(
            'livewire.mobile-comparator-operators',
            [
                'telecomOffers' => $telecomOffers,
            ]
        );
    }

}
