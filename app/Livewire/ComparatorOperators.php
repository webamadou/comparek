<?php

namespace App\Livewire;

use App\Models\TelecomOffer;
use App\Models\TelecomOperator;
use App\Models\TelecomServiceType;
use Livewire\Component;
use Livewire\WithPagination;

class ComparatorOperators extends Component
{
    use WithPagination;

    public $operator = '';
    public $operators = '';
    public $serviceType = '';
    public $serviceTypes = '';

    public function updating($property)
    {
        if ($property !== 'sortBy' && $property !== 'sortDirection') {
            $this->resetPage();
        }
    }

    public function btnClicked()
    {
        dd($this->operator);
    }

    public function mount()
    {
        $this->operators = TelecomOperator::orderBy('name')->get();
        $this->serviceTypes = TelecomServiceType::orderBy('name')->get();
    }

    public function render()
    {
        $telecomOffers = TelecomOffer::query()
            ->with(['operator', 'serviceType', 'features'])
            ->when($this->operator, fn ($query) => $query->where('telecom_operator_id', $this->operator))
            ->when($this->serviceType, fn ($query) => $query->where('telecom_service_type_id', $this->serviceType))
            ->orderBy('name')
            ->get();

        return view('livewire.comparator-operators', compact('telecomOffers'));
    }
}
