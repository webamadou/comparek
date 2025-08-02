<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $filterAccredited = null;
    public $filterForeignStudents = null;
    public bool $showDeleteModal = false;
    public $deleteId;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        Category::find($this->deleteId)?->delete();
        $this->showDeleteModal = false;
        session()->flash('success', __('commons.record_deleted'));
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::query()
            ->when(! empty($this->search), fn($query) =>
            $query->where('name', 'like', "%{$this->search}%")
            )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.category-table')
            ->with('categories', $categories);
    }
}
