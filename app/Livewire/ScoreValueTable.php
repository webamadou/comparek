<?php

namespace App\Livewire;

use App\Models\ScoreValue;
use Livewire\Component;
use Livewire\WithPagination;

class ScoreValueTable extends Component
{
    use WithPagination;

    public $searchCriteria = '';
    public $searchEntityType = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $showDeleteModal = false;
    public $deleteId = null;

    public function updating($field)
    {
        if (in_array($field, ['searchCriteria', 'searchEntityType'])) {
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
        ScoreValue::find($this->deleteId)?->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Score supprimé avec succès !');
    }

    public function render()
    {
        $query = ScoreValue::with('criteria')
            ->when($this->searchCriteria, function ($q) {
                $q->whereHas('criteria', fn($q2) => $q2->where('name', 'like', "%{$this->searchCriteria}%"));
            })
            ->when($this->searchEntityType, function ($q) {
                $q->where('vertical_entity_type', $this->searchEntityType);
            })
            ->orderBy($this->sortField, $this->sortDirection);

        $items = $query->paginate($this->perPage);

        return view('livewire.score-value-table', compact('items'));
    }
}
