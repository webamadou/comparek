<?php

namespace App\Livewire;

use App\Enums\ScoreGrade;
use App\Models\ScoreCriteria;
use App\Models\TelecomOffer;
use App\Models\TelecomOperator;
use Livewire\Component;

class TelecomComparekScore extends Component
{
    public $operator = [];
    public $operators = '';
    public $score = [];
    public $scores = '';
    public $sortBy = '';

    public function mount()
    {
        $this->operators = TelecomOperator::all();
        $this->scores = ScoreGrade::cases();
    }

    public function updated()
    {
        $this->dispatch('scroll-to-filters');
    }

    public function resetFilter()
    {
        $this->js('window.location.reload()');
    }

    public function render()
    {
        $offers = TelecomOffer::query()
            ->with('operator')
            ->with('scoreValues')
            ->when($this->operator, fn ($query) => $query->where('telecom_operator_id', $this->operator))
            ->get()
            ->filter(function ($offer) {
                if (!empty($this->score)) {
                    return $offer?->currentScoreGrade()->name == $this->score;
                }
                return $offer;
            })
            ->sortByDesc(function ($offer) {
                    return $offer->currentScore();
            });
        $scoreCriterias = ScoreCriteria::pluck('id', 'name');
        return view('livewire.telecom-comparek-score', compact('offers',  'scoreCriterias'));
    }
}
