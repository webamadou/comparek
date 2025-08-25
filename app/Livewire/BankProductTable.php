<?php

namespace App\Livewire;

use App\Models\Bank;
use App\Models\BankProduct;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BankProductTable extends Component
{
    use WithPagination, AuthorizesRequests;

    #[Url(as:'q')] public string $search = '';
    #[Url] public ?int $bank_id = null;
    #[Url] public ?string $product_type = null;
    #[Url] public ?string $status = null;

    #[Url] public string $sortField = 'id';
    #[Url] public string $sortDirection = 'desc';
    #[Url] public int $perPage = 15;

    public function updatingSearch(){ $this->resetPage(); }
    public function updatingBankId(){ $this->resetPage(); }
    public function updatingProductType(){ $this->resetPage(); }
    public function updatingStatus(){ $this->resetPage(); }
    public function updatingPerPage(){ $this->resetPage(); }

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
        // $this->authorize('viewAny', BankProduct::class);

        $banks = Bank::orderBy('name')->get(['id','name']);

        $products = BankProduct::query()
            ->with('bank:id,name')
            ->withCount('offers')
            ->when($this->search !== '', fn($q) =>
            $q->where(fn($w) =>
            $w->where('name','like',"%{$this->search}%")
                ->orWhere('slug','like',"%{$this->search}%")
            )
            )
            ->when($this->bank_id, fn($q) => $q->where('bank_id', $this->bank_id))
            ->when($this->product_type, fn($q) => $q->where('product_type', $this->product_type))
            ->when($this->status, fn($q) => $q->where('is_active', $this->status === 'active'))
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.bank-product-table', compact('products','banks'));
    }
}
