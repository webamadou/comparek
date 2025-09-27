<?php

namespace App\Livewire\Traits;

use App\Models\TelecomOfferFeature;
use Livewire\Attributes\On;

trait BuildsTelecomOfferQuery
{
    public $operator = '';
    public $validityLength = 0;
    public $data = 0;
    public $voiceMinutes = 0;
    public $sms_nbr = 0;
    public $phoneCredit = 0;
    public $price = 0;
    public $mobilePricePerMonthMin = 25000;
    public $sortBy = '';
    public $orderDirection = 'asc';
    public $score = '';
    public $filterIsApplied = false;

    public function resetFields()
    {
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
            //'technology',
            //'pricePerMonthMin',
            //'defaultPricePerMonthMax',
        ]);
    }

    protected function buildMobileQueryOffer()
    {
        return TelecomOfferFeature::query()
            ->with([
                'offer:id,telecom_operator_id',
                'offer.operator:id,name'
            ])
            ->when($this->operator, fn ($query) =>
                $query->whereHas('offer', fn ($q) => $q->where('telecom_operator_id', $this->operator))
            )
            ->when($this->validityLength > 0 && $this->validityLength < 30, fn ($query) => $query->where('validity_length', $this->validityLength))
            ->when($this->validityLength >= 30, fn ($query) => $query->where('validity_length', '>=', $this->validityLength))
            ->when($this->priceRange[0] > 0 || $this->priceRange[1] < 5000, function ($query) {
                return $query->whereBetween('price', $this->priceRange);
            })
            ->when($this->dataRange[0] > 0 || $this->dataRange[1] < 102400, function ($q) {
                [$min,$max] = $this->dataRange; // Mo
                $q->whereRaw("
                CASE
                    WHEN data_volume_unit = 'Go' THEN data_volume_value * 1024
                    WHEN data_volume_unit = 'Mo' THEN data_volume_value
                    ELSE NULL
                END BETWEEN ? AND ?
                ", [$min, $max]);
            })
            ->when($this->minutesRange[0] > 0 || $this->minutesRange[1] < 1000, fn($q) => $q->whereBetween('voice_minutes', $this->minutesRange))
            ->when($this->smsRange[0] > 0 || $this->smsRange[1] < 1000, fn($q) => $q->whereBetween('sms_nbr', $this->smsRange))
            ->when($this->sortBy === 'sms_nbr', fn ($query) =>
                $query->whereNotNull('sms_nbr')->orderBy('sms_nbr', $this->orderDirection)
            )
            ->when($this->sortBy === 'data_volume_value', fn ($query) =>
                $query->whereNotNull('data_volume_value')->whereNotNull('data_volume_unit')
                    ->orderByRaw("
                        CASE
                            WHEN data_volume_unit = 'Go' THEN data_volume_value * 1024
                            WHEN data_volume_unit = 'Mo' THEN data_volume_value
                            ELSE NULL
                        END {$this->orderDirection}
                    ")
            )
            ->when(!empty($this->sortBy) && $this->sortBy !== 'sort_note' && !in_array($this->sortBy, ['sms_nbr', 'data_volume_value']), fn ($query) =>
                $query->orderBy($this->sortBy, $this->orderDirection)
            )
            ->get()
            ->filter(function ($feature) {
                if (!empty($this->score)) {
                    return $feature->offer->currentScoreGrade()->name === $this->score;
                }
                return $feature;
            })
            ->sortByDesc(function ($feature) {
                if ($this->sortBy === 'sort_note') {
                    return $feature->offer->currentScore();
                }
            });
    }

    protected function buildQueryByOperator($operatorId)
    {
        return TelecomOfferFeature::query()
            ->whereHas('offer', fn ($q) => $q->where('telecom_operator_id', $operatorId))
            ->with([
                'offer:id,telecom_operator_id,detailed_description',
                'offer.operator:id,name',
                'offer.operator.images' => fn ($query) => $query->select('id', 'imageable_id', 'imageable_type', 'path')
            ])
            ->when($this->validityLength > 0 && $this->validityLength < 30, fn ($query) => $query->where('validity_length', $this->validityLength))
            ->when($this->validityLength >= 30, fn ($query) => $query->where('validity_length', '>=', $this->validityLength))
            ->when($this->priceRange[0] > 0 || $this->priceRange[1] < 5000, function ($query) {
                return $query->whereBetween('price', $this->priceRange);
            })
            ->when($this->dataRange[0] > 0 || $this->dataRange[1] < 102400, function ($q) {
                [$min,$max] = $this->dataRange; // Mo
                $q->whereRaw("
                CASE
                    WHEN data_volume_unit = 'Go' THEN data_volume_value * 1024
                    WHEN data_volume_unit = 'Mo' THEN data_volume_value
                    ELSE NULL
                END BETWEEN ? AND ?
                ", [$min, $max]);
            })
            ->when($this->minutesRange[0] > 0 || $this->minutesRange[1] < 1000, fn($q) => $q->whereBetween('voice_minutes', $this->minutesRange))
            ->when($this->smsRange[0] > 0 || $this->smsRange[1] < 1000, fn($q) => $q->whereBetween('sms_nbr', $this->smsRange))
            ->orderBy('validity_length', 'asc')
            ->get();
    }

    public function updateFilterIsApplied()
    {
        $this->filterIsApplied = (
            !empty($this->operator) ||
            $this->validityLength > 0 ||
            $this->data > 0 ||
            $this->voiceMinutes > 0 ||
            $this->sms_nbr > 0 ||
            $this->phoneCredit > 0 ||
            $this->price > 0 ||
            !empty($this->sortBy) ||
            !empty($this->score)
        );
    }
}
