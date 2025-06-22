<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
    use App\Models\TelecomOfferFeature;

class TelecomOfferFeaturesTable extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchOffer = '';
    public $perPage = 50;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $selected = [];
    public $showDeleteModal = false;
    public $deleteId = null;

    protected $queryString = [
        'searchName',
        'searchOffer',
        'sortField',
        'sortDirection',
        'perPage',
    ];

    public function updating($field)
    {
        if (in_array($field, ['searchName', 'searchOffer'])) {
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
        TelecomOfferFeature::find($this->deleteId)?->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Feature deleted successfully!');
    }

    public function deleteSelected()
    {
        TelecomOfferFeature::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        session()->flash('success', 'Selected features deleted successfully!');
    }

    public function render()
    {
        $query = TelecomOfferFeature::query()
            ->with('offer')
            ->when($this->searchName, fn($q) => $q->where('name', 'like', '%' . $this->searchName . '%'))
            ->when($this->searchOffer, fn($q) => $q->whereHas('offer', fn($q2) => $q2->where('name', 'like', '%' . $this->searchOffer . '%')))
            ->orderBy($this->sortField, $this->sortDirection)
        ;

        $items = $query->paginate($this->perPage);

        return view('livewire.telecom-offer-features-table', compact('items'));
    }
}
