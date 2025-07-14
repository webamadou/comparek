<?php

namespace App\Livewire;

use App\Enums\ScoreGrade;
use App\Models\TelecomOfferFeature;
use App\Models\TelecomOperator;
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
        $this->dispatch('filter-applied', []);
    }

    public function resetField($field)
    {
        $this->reset($field);
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
            ->when($this->validityLength > 0 && $this->validityLength < 30, fn ($query) => $query->where('validity_length', $this->validityLength))
            ->when($this->validityLength >= 30, fn ($query) => $query->where('validity_length', '>=', $this->validityLength))
            ->when($this->data > 0 && $this->data < 1024, function ($query) {
                return $query->whereRaw("
                    CASE
                        WHEN data_volume_unit = 'Go' THEN data_volume_value * 1024
                        WHEN data_volume_unit = 'Mo' THEN data_volume_value
                        ELSE NULL
                    END <= ?
                ", [$this->data]);
            })
            ->when($this->data >= 1024, function ($query) {
                return $query->whereRaw("
                    CASE
                        WHEN data_volume_unit = 'Go' THEN data_volume_value * 1024
                        WHEN data_volume_unit = 'Mo' THEN data_volume_value
                        ELSE NULL
                    END >= ?
                ", [$this->data]);
            })
            ->when($this->voiceMinutes > 0, function ($query) {
                if ($this->voiceMinutes < 1000) {
                    return $query->where('voice_minutes', '<=', $this->voiceMinutes);
                } else {
                    return $query->where('voice_minutes', '>=', $this->voiceMinutes);
                }
            })
            ->when($this->sms_nbr > 0, function ($query) {
                if ($this->sms_nbr < 1000) {
                    return $query->where('sms_nbr', '<=', $this->sms_nbr);
                } else {
                    return $query->where('sms_nbr', '>=', $this->sms_nbr);
                }
            })
            ->when($this->phoneCredit > 0, function ($query) {
                if ($this->phoneCredit < 5000) {
                    return $query->where('phone_credit', '<=', $this->phoneCredit);
                } else {
                    return $query->where('phone_credit', '>=', $this->phoneCredit);
                }
            })
            ->when($this->price > 0, function ($query) {
                if ($this->price < 5000) {
                    return $query->where('price', '<=', $this->price);
                } else {
                    return $query->where('price', '>=', $this->price);
                }
            })
            ->when($this->sortBy === 'sms_nbr', function ($query) {
                return $query->whereNotNull('sms_nbr')
                    ->orderBy('sms_nbr', $this->orderDirection);
            })
            ->when($this->sortBy === 'data_volume_value', function ($query) {
                return $query->whereNotNull('data_volume_value')->whereNotNull('data_volume_unit')
                    ->orderByRaw("
                    CASE
                        WHEN data_volume_unit = 'Go' THEN data_volume_value * 1024
                        WHEN data_volume_unit = 'Mo' THEN data_volume_value
                        ELSE NULL
                    END {$this->orderDirection}
                ");
            })
            ->when(!empty($this->sortBy) && $this->sortBy !== 'sort_note' && !in_array($this->sortBy, ['sms_nbr', 'data_volume_value']), function ($query) {
                return $query->whereNotNull($this->sortBy)
                    ->orderBy($this->sortBy, $this->orderDirection);
            })
            ->get()
            ->filter(function ($feature) {
                if (!empty($this->score)) {
                    return in_array($feature->offer->currentScoreGrade()->name, $this->score);
                }
                return $feature;
            })
            ->sortByDesc(function ($feature) {
                if ($this->sortBy === 'sort_note') {
                    return $feature->offer->currentScore();
                }
            });

        return view('livewire.mobile-comparator-operators', compact('telecomOffers'));
    }

}
