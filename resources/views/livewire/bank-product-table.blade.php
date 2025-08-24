{{-- resources/views/livewire/bank-product-index.blade.php --}}
<div class="space-y-6">
  <div class="flex flex-wrap items-center gap-3">
    <input type="text" placeholder="Rechercher produit…" class="border rounded px-3 py-2 w-64"
           wire:model.live.debounce.500ms="search">

    <select class="border rounded px-3 py-2" wire:model.live="bank_id">
      <option value="">Banque (toutes)</option>
      @foreach($banks as $b)
        <option value="{{ $b->id }}">{{ $b->name }}</option>
      @endforeach
    </select>

    <select class="border rounded px-3 py-2" wire:model.live="product_type">
      <option value="">Type (tous)</option>
      <option value="current_account">Compte courant</option>
      <option value="savings_account">Épargne</option>
      <option value="fixed_deposit">Dépôt à terme</option>
      <option value="business_account">Compte entreprise</option>
      <option value="consumer_loan">Crédit conso</option>
      <option value="mortgage_loan">Crédit immo</option>
      <option value="auto_loan">Crédit auto</option>
      <option value="sme_loan">Crédit PME</option>
      <option value="debit_card">Carte débit</option>
      <option value="credit_card">Carte crédit</option>
      <option value="prepaid_card">Carte prépayée</option>
      <option value="digital_banking">Digital banking</option>
    </select>

    <select class="border rounded px-3 py-2" wire:model.live="status">
      <option value="">Statut (tous)</option>
      <option value="active">Actifs</option>
      <option value="inactive">Inactifs</option>
    </select>

    <select class="border rounded px-3 py-2" wire:model.live="perPage">
      <option value="10">10 / page</option>
      <option value="15">15 / page</option>
      <option value="25">25 / page</option>
      <option value="50">50 / page</option>
    </select>

    @can('create', \App\Models\BankProduct::class)
      <a href="{{ route('bank_product.create') }}" class="ml-auto inline-block bg-indigo-600 text-white px-4 py-2 rounded">
        + Nouveau produit
      </a>
    @endcan
  </div>

  <div class="overflow-x-auto bg-white shadow rounded">
    <table class="min-w-full text-sm table table-bordered align-middle">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('name')">Nom</th>
          <th class="px-4 py-3">Banque</th>
          <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('product_type')">Type</th>
          <th class="px-4 py-3">Monnaie</th>
          <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('is_active')">Actif</th>
          <th class="px-4 py-3"># Offres</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($products as $p)
          <tr class="border-t">
            <td class="px-4 py-2 font-medium">{{ $p->name }}</td>
            <td class="px-4 py-2">{{ $p->bank->name ?? '—' }}</td>
            <td class="px-4 py-2">{{ $p->product_type }}</td>
            <td class="px-4 py-2">{{ $p->currency }}</td>
            <td class="px-4 py-2">
              <span class="px-2 py-1 rounded text-xs {{ $p->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' }}">
                {{ $p->is_active ? 'Oui' : 'Non' }}
              </span>
            </td>
            <td class="px-4 py-2">{{ $p->offers_count }}</td>
            <td class="px-4 py-2">
              <a href="{{ route('bank_product.edit', $p) }}" class="underline btn btn-primary py-0"><span class="fa fa-pencil"></span>Éditer</a>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="px-4 py-6 text-center text-gray-500">Aucun produit trouvé.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div>
    {{ $products->links() }}
  </div>
</div>
