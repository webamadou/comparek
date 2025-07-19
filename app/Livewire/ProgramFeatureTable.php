<?php

namespace App\Livewire;

use App\Models\ProgramFeature;
use Livewire\Component;
use Livewire\WithPagination;

class ProgramFeatureTable extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;
    public string $sortField = 'name';
    public string $sortDirection = 'asc';
    public int $deleteId = 0;
    public bool $showDeleteModal = false;

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
        ProgramFeature::find($this->deleteId)?->delete();
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
        $features = ProgramFeature::query()
            ->when(! empty($this->search), fn($query) =>
            $query->where('name', 'like', "%{$this->search}%")
            )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.program-feature-table')->with(compact('features'));
    }
}
