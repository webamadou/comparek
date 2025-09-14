<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;
use Livewire\WithPagination;

class PageTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 20;
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $filterPublished = null;
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
        $page = Page::find($this->deleteId);
        if ($page->cannot_delete) {
            $this->showDeleteModal = false;
            session()->flash('error', __('pages.cannot_delete'));
            return;
        }
        $page->delete();
        $this->showDeleteModal = false;
        session()->flash('success', __('pages.deleted'));
    }

    public function render()
    {

        $pages = Page::query()
            ->when(! empty($this->search), fn($query) =>
            $query->where('name', 'like', "%{$this->search}%")
            )
            ->when($this->filterPublished, fn($query) =>
                $query->where('status', $this->filterPublished)
            )
            ->orderBy('published_at', 'desc')
            ->paginate(20)
            ->withQueryString();

            return view('livewire.page-table', compact('pages'));
    }
}
