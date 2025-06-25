<?php

namespace App\Livewire;

use App\Models\ScoreCriteria;
use Livewire\Component;
use Livewire\WithPagination;

class ScoreCriteriaTable extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchVertical = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $selected = [];
    public $showDeleteModal = false;
    public $deleteId = null;

    protected $queryString = [
        'searchName',
        'searchVertical',
        'sortField',
        'sortDirection',
        'perPage',
    ];

    public function updating($field)
    {
        if (in_array($field, ['searchName', 'searchVertical'])) {
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
        ScoreCriteria::find($this->deleteId)?->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Criteria deleted successfully!');
    }

    public function deleteSelected()
    {
        ScoreCriteria::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        session()->flash('success', 'Selected criteria deleted successfully!');
    }

    public function render()
    {
        $query = ScoreCriteria::query()
            ->when($this->searchName, fn($q) => $q->where('name', 'like', '%' . $this->searchName . '%'))
            ->when($this->searchVertical, fn($q) => $q->where('vertical', $this->searchVertical))
            ->orderBy($this->sortField, $this->sortDirection);

        $items = $query->paginate($this->perPage);

        return view('livewire.score-criteria-table', compact('items'));
    }
}
