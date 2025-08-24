<?php

namespace App\Livewire;

use App\Models\Bank;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BankTable extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    #[Url(as: 'q')]
    public string $search = '';

    #[Url]
    public ?string $category = null; // bank | eme | sfd
    #[Url]
    public ?string $status = null;   // active | inactive

    #[Url]
    public string $sortField = 'id';
    #[Url]
    public string $sortDirection = 'desc';

    #[Url]
    public int $perPage = 15;

    public function updatingSearch(): void { $this->resetPage(); }
    public function updatingCategory(): void { $this->resetPage(); }
    public function updatingStatus(): void { $this->resetPage(); }
    public function updatingPerPage(): void { $this->resetPage(); }

    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render(): View
    {
        // TODO: properly integrate policies later
        // $this->authorize('viewAny', Bank::class);

        $banks = Bank::query()
            ->withCount(['branches','atms','products'])
            ->when($this->search !== '', fn($q) =>
            $q->where(fn($w) =>
            $w->where('name','like',"%{$this->search}%")
                ->orWhere('slug','like',"%{$this->search}%")
                ->orWhere('swift_bic','like',"%{$this->search}%")
            )
            )
            ->when($this->category, fn($q) => $q->where('category', $this->category))
            ->when($this->status, fn($q) =>
            $q->where('is_active', $this->status === 'active'))
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.bank-table', [
            'banks' => $banks,
        ]);
    }
}
