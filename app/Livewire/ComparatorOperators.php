<?php

namespace App\Livewire;

use App\Models\TelecomOffer;
use App\Models\TelecomOperator;
use App\Models\TelecomServiceType;
use App\ScoreGrade;
use Livewire\Component;
use Livewire\WithPagination;

class ComparatorOperators extends Component
{
    use WithPagination;

    public $operator = [];
    public $operators = '';
    public $serviceType = [];
    public $serviceTypes = '';
    public $score = [];
    public $scores = '';
    public $maxPrice = 100000;
    public $pricePerMonthMin = 100000;
    public $pricePerMonthMax = 100000;
    public $technology = [];
    public $debit = 1000;
    public $debit_unit = '';

    public function updating($property)
    {
        if ($property !== 'sortBy' && $property !== 'sortDirection') {
            $this->resetPage();
        }
    }

    public function updated()
    {
        //;
    }

    public function mount()
    {
        $this->operators = TelecomOperator::orderBy('name')->get();
        $this->serviceTypes = TelecomServiceType::whereIn('id', [2,5])->orderBy('name')->get();
        $this->scores = ScoreGrade::cases();
    }

    public function render()
    {
        $telecomOffers = TelecomOffer::query()
            ->with(['operator', 'serviceType', 'features'])
            ->withWhereHas('serviceType', fn ($query) => $query->whereIn('id', [2,5]))
            ->when($this->operator, fn ($query) => $query->whereIn('telecom_operator_id', $this->operator))
            ->when($this->serviceType, fn ($query) => $query->whereIn('telecom_service_type_id', $this->serviceType))
            ->when($this->pricePerMonthMin < $this->maxPrice, fn ($query) => $query->where('price_per_month', '<', $this->pricePerMonthMin))
            ->when(! empty($this->technology), fn ($query) => $query->whereIn('technology', $this->technology))
            ->orderBy('name')
            ->get()
            ->filter(function ($offer) {
                if (! empty($this->score)) {
                    return in_array($offer->currentScoreGrade()->name, $this->score);
                }

                return $offer;
            });
            ;

        return view('livewire.comparator-operators', compact('telecomOffers'));
    }
}
