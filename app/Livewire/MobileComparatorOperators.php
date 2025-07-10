<?php

namespace App\Livewire;

use App\Models\TelecomOfferFeature;
use App\Models\TelecomOperator;
use App\ScoreGrade;
use Livewire\Component;

class MobileComparatorOperators extends Component
{
    public $operator = [];
    public $operators = '';
    public $validityLength = 0;
    public $validityOptions = [];
    public $score = [];
    public $scores = '';
    public $price = 0;
    public $technology = [];
    public $data = 0;
    public $data_unit = '';
    public int $sms_nbr = 0;
    public int $voiceMinutes = 0;
    public int $phoneCredit = 0;
    public $sortBy = '';
    public $orderDirection = 'asc';

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
        dd($this->validityLength);
    }

    public function resetFilter()
    {
        $this->js('window.location.reload()');
    }

    public function render()
    {
        $telecomOffers = TelecomOfferFeature::query()
            ->with('offer')
            ->with('offer.operator')
            ->when($this->operator, fn ($query) => $query->whereHas('offer', fn ($q) => $q->whereIn('telecom_operator_id', $this->operator)))
            ->when($this->validityLength > 0, fn ($query) => $query->where('validity_length', $this->validityLength))
            ->get();
        return view('livewire.mobile-comparator-operators', compact('telecomOffers'));
    }
}
