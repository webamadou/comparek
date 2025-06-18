<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TelecomOperator;

class TelecomOperatorsTable extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchSlug = '';
    public $searchActive = '';
    public $showDeleteModal = false;
    public $deleteId = null;

    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;

    protected $queryString = [
        'searchName',
        'searchSlug',
        'searchActive',
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

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        TelecomOperator::find($this->deleteId)->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Operator deleted successfully!');
    }

    public function render()
    {
        $query = TelecomOperator::query()
            ->when($this->searchName, fn($q) => $q->where('name', 'like', '%' . $this->searchName . '%'))
            ->when($this->searchSlug, fn($q) => $q->where('slug', 'like', '%' . $this->searchSlug . '%'))
            ->when($this->searchActive !== '', fn($q) => $q->where('is_active', $this->searchActive));

        $operators = $query->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.telecom-operators-table', compact('operators'));
    }
}
