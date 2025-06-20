<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TelecomServiceType;

class TelecomServiceTypesTable extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchSlug = '';

    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;

    public $selected = [];
    public $showDeleteModal = false;
    public $deleteId = null;

    protected $queryString = [
        'searchName',
        'searchSlug',
        'sortField',
        'sortDirection',
        'perPage',
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updating($field)
    {
        if (in_array($field, ['searchName', 'searchSlug'])) {
            $this->resetPage();
        }
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        TelecomServiceType::find($this->deleteId)?->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Service Type deleted successfully!');
    }

    public function deleteSelected()
    {
        TelecomServiceType::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        session()->flash('success', 'Selected service types deleted successfully!');
    }

    public function render()
    {
        $query = TelecomServiceType::query()
            ->when($this->searchName, fn($q) => $q->where('name', 'like', '%' . $this->searchName . '%'))
            ->when($this->searchSlug, fn($q) => $q->where('slug', 'like', '%' . $this->searchSlug . '%'))
            ->orderBy($this->sortField, $this->sortDirection);

        $items = $query->paginate($this->perPage);

        return view('livewire.telecom-service-types-table', compact('items'));
    }
}
