<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TelecomOffer;

class TelecomOffersTable extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchOperator = '';
    public $perPage = 100;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $selected = [];
    public $showDeleteModal = false;
    public $deleteId = null;

    protected $queryString = [
        'searchName',
        'searchOperator',
        'sortField',
        'sortDirection',
        'perPage',
    ];

    public function updating($field)
    {
        if (in_array($field, ['searchName', 'searchOperator'])) {
            $this->resetPage();
        }
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        TelecomOffer::find($this->deleteId)?->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Offer deleted successfully!');
    }

    public function deleteSelected()
    {
        TelecomOffer::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        session()->flash('success', 'Selected offers deleted successfully!');
    }

    public function render()
    {
        $query = TelecomOffer::query()
            ->join('telecom_operators', 'telecom_offers.telecom_operator_id', '=', 'telecom_operators.id')
            ->join('telecom_service_types', 'telecom_offers.telecom_service_type_id', '=', 'telecom_service_types.id')
            ->select('telecom_offers.*', 'telecom_operators.name as operator_name')
            ->when($this->searchName, fn($q) => $q->where('telecom_offers.name', 'like', '%' . $this->searchName . '%'))
            ->when($this->searchOperator, fn($q) => $q->where('telecom_operators.name', 'like', '%' . $this->searchOperator . '%'))
            ->orderBy(
                $this->sortField == 'operator_name' ?  'telecom_operators.name' : ('service_type' ? 'telecom_service_types.name' : $this->sortField),
                $this->sortDirection
            );

        $items = $query->paginate($this->perPage);

        return view('livewire.telecom-offers-table', compact('items'));
    }
}
