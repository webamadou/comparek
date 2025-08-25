<?php

namespace App\Livewire;

use App\Models\Bank;
use App\Models\BankProduct;
use App\Models\ProductOffer;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BankOfferTable extends Component
{
    use WithPagination, AuthorizesRequests;

    #[Url(as:'q')] public string $search = '';
    #[Url] public ?int $bank_id = null;
    #[Url] public ?int $bank_product_id = null;
    #[Url] public ?string $status = null;

    #[Url] public string $sortField = 'id';
    #[Url] public string $sortDirection = 'desc';
    #[Url] public int $perPage = 15;

    public function updatedBankId(): void
    {
        // reset produit si banque change
        $this->bank_product_id = null;
        $this->resetPage();
    }

    public function updatingSearch(){ $this->resetPage(); }
    public function updatingBankProductId(){ $this->resetPage(); }
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
        // $this->authorize('viewAny', ProductOffer::class);

        $banks = Bank::orderBy('name')->get(['id','name']);
        $products = BankProduct::query()
            ->when($this->bank_id, fn($q) => $q->where('bank_id', $this->bank_id))
            ->orderBy('name')
            ->get(['id','name','bank_id']);

        $offers = ProductOffer::query()
            ->with(['product:id,name,bank_id','product.bank:id,name'])
            ->when($this->search !== '', fn($q) =>
            $q->where(fn($w) =>
            $w->where('name','like',"%{$this->search}%")
                ->orWhere('slug','like',"%{$this->search}%")
            )
            )
            ->when($this->bank_product_id, fn($q) => $q->where('bank_product_id', $this->bank_product_id))
            ->when($this->bank_id, fn($q) =>
            $q->whereHas('product', fn($p) => $p->where('bank_id', $this->bank_id)))
            ->when($this->status, fn($q) => $q->where('is_active', $this->status === 'active'))
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.bank-offer-table', compact('offers','banks','products'));
    }
}
