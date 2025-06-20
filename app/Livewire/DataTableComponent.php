<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

abstract class DataTableComponent extends Component
{
    use WithPagination;

    public $selected = [];
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;

    public $showDeleteModal = false;
    public $deleteId = null;

    protected $queryString = [
        'sortField',
        'sortDirection',
        'perPage',
    ];

    abstract protected function query(): Builder;

    abstract protected function filters(): array;

    abstract protected function columns(): array;

    public function updating($field)
    {
        if (str_starts_with($field, 'filters')) {
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
        $this->getModel()::find($this->deleteId)?->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Record deleted successfully!');
    }

    public function deleteSelected()
    {
        $this->getModel()::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        session()->flash('success', 'Selected records deleted successfully!');
    }

    public function getModel()
    {
        // Each child class will define MODEL constant
        return static::MODEL;
    }

    public function render()
    {
        $query = $this->query();

        // Apply filters dynamically
        foreach ($this->filters() as $field => $type) {
            $value = $this->filters[$field] ?? null;

            if (!is_null($value) && $value !== '') {
                $query->where($field, 'like', "%{$value}%");
            }
        }

        $items = $query->orderBy($this->sortField, $this->sortDirection)
                       ->paginate($this->perPage);

        return view('livewire.data-table-component', [
            'items' => $items,
            'columns' => $this->columns(),
        ]);
    }
}
