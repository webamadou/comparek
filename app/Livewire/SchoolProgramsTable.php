<?php

namespace App\Livewire;

use App\Models\SchoolProgram;
use App\Models\ProgramDomain;
use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;

class SchoolProgramsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $filterSchool = null;
    public $filterDomain = null;
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
        SchoolProgram::find($this->deleteId)?->delete();
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
        $query = SchoolProgram::with(['school', 'domains'])
            ->when($this->search, fn($q) =>
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhereHas('school', fn($sq) => $sq->where('name', 'like', "%{$this->search}%"))
            )
            ->when($this->filterSchool, fn($q) => $q->where('school_id', $this->filterSchool))
            ->when($this->filterDomain, fn($q) => $q->whereHas('domains', fn ($query) => $query->whereIn('id', $this->filterDomain)))
            ->orderBy($this->sortField, $this->sortDirection);

        return view('livewire.school-programs-table', [
            'programs' => $query->paginate($this->perPage),
            'schools' => School::orderBy('name')->where('is_active', true)->get(),
            'domains' => ProgramDomain::orderBy('name')->get(),
        ]);
    }
}
