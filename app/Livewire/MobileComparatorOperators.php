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

    public function resetFilter()
    {
        $this->js('window.location.reload()');
    }

    protected function generateCacheKey(): string
    {
        return 'mobile_comparator_' . md5(json_encode([
                'operator' => $this->operator,
                'validityLength' => $this->validityLength,
                'data' => $this->data,
                'voiceMinutes' => $this->voiceMinutes,
                'sms_nbr' => $this->sms_nbr,
                'phoneCredit' => $this->phoneCredit,
                'price' => $this->price,
                'score' => $this->score,
                'sortBy' => $this->sortBy,
                'orderDirection' => $this->orderDirection,
            ]));
    }

    public function render()
    {
        $cacheKey = $this->generateCacheKey();

        $telecomOffers = Cache::remember($cacheKey.'v1.0.1.1', Config::get('cache.duration'), function () {
            return $this->buildMobileQueryOffer()->all();
        });

        return view('livewire.mobile-comparator-operators', [
            'telecomOffers' => $telecomOffers,
        ]);
    }

}
