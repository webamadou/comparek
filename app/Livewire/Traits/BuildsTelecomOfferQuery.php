<?php

namespace App\Livewire\Traits;

use App\Models\TelecomOfferFeature;

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
            ->when($this->data > 0, function ($query) {
                if ($this->data < 1024*5) {
                    $min = max($this->data - 20, 0);
                    $max = $this->data + 20;

                    return $query->whereRaw("
                        CASE
                            WHEN data_volume_unit = 'Go' THEN data_volume_value * 1024
                            WHEN data_volume_unit = 'Mo' THEN data_volume_value
                            ELSE NULL
                        END BETWEEN ? AND ?
                    ", [$min, $max]);
                } else {
                    return $query->whereRaw("
                        CASE
                            WHEN data_volume_unit = 'Go' THEN data_volume_value * 1024
                            WHEN data_volume_unit = 'Mo' THEN data_volume_value
                            ELSE NULL
                        END >= ?
                    ", [5000]);
                }
            })
            ->when($this->voiceMinutes > 0, function ($query) {
                return $this->voiceMinutes < 1000
                    ? $query->where('voice_minutes', '>=', $this->voiceMinutes - 10)->where('voice_minutes', '<=', $this->voiceMinutes + 10)
                    : $query->where('voice_minutes', '>=', $this->voiceMinutes);
            })
            ->when($this->sms_nbr > 0, function ($query) {
                return $this->sms_nbr < 1000
                    ? $query->where('sms_nbr', '>=', $this->sms_nbr - 10)->where('sms_nbr', '<=', $this->sms_nbr + 10)
                    : $query->where('sms_nbr', '>=', $this->sms_nbr);
            })
            ->when($this->phoneCredit > 0, function ($query) {
                return $this->phoneCredit < 8000
                    ? $query->where('phone_credit', '>=', $this->phoneCredit)->where('phone_credit', '<=', $this->phoneCredit + 50)
                    : $query->where('phone_credit', '>=', $this->phoneCredit);
            })
            ->when($this->price > 0, function ($query) {
                return $this->price < 5000
                    ? $query->where('price', '>=', $this->price - 200)->where('price', '<=', $this->price + 200)
                    : $query->where('price', '>=', $this->price);
            })
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
                $query->whereNotNull($this->sortBy)->orderBy($this->sortBy, $this->orderDirection)
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
                return $this->voiceMinutes < 1000
                    ? $query->where('voice_minutes', '<=', $this->voiceMinutes)
                    : $query->where('voice_minutes', '>=', $this->voiceMinutes);
            })
            ->when($this->sms_nbr > 0, function ($query) {
                return $this->sms_nbr < 1000
                    ? $query->where('sms_nbr', '<=', $this->sms_nbr)
                    : $query->where('sms_nbr', '>=', $this->sms_nbr);
            })
            ->when($this->phoneCredit > 0, function ($query) {
                return $this->phoneCredit < 5000
                    ? $query->where('phone_credit', '<=', $this->phoneCredit)
                    : $query->where('phone_credit', '>=', $this->phoneCredit);
            })
            ->when($this->price > 0, function ($query) {
                return $this->price < 5000
                    ? $query->where('price', '>=', $this->price - 200)->where('price', '<=', $this->price + 200)
                    : $query->where('price', '>=', $this->price);
            })

            // Sorting
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
                $query->whereNotNull($this->sortBy)->orderBy($this->sortBy, $this->orderDirection)
            )
            ->orderBy('validity_length', 'asc')
            ->get()
            ->filter(function ($feature) {
                if (!empty($this->score)) {
                    return $feature->offer->currentScoreGrade()->name === $this->score;
                }
                return $feature;
            })
            /* ->sortByDesc(function ($feature) {
                if ($this->sortBy === 'sort_note') {
                    return $feature->validityLength;
                }
            }) */;
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
