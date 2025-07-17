<?php

namespace App\Livewire;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;

class SchoolTable extends Component
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
        School::find($this->deleteId)?->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Enregistrement supprim<UNK>!');
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
        $schools = School::query()
            ->where('is_active', true)
            ->when(! empty($this->search), fn($query) =>
            $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('city', 'like', "%{$this->search}%")
            )
            ->when(! empty($this->filterAccredited), fn($query) =>
            $query->where('is_accredited', $this->filterAccredited)
            )
            ->when(! empty($this->filterForeignStudents), fn($query) =>
            $query->where('accepts_foreign_students', $this->filterForeignStudents)
            )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.school-table')
            ->with('schools', $schools);
    }
}
