{{-- resources/views/livewire/product-offer-index.blade.php --}}
<div class="space-y-6">
  <div class="flex flex-wrap items-center gap-3">
    <input type="text" placeholder="Rechercher offre…" class="border rounded px-3 py-2 w-64"
           wire:model.live.debounce.500ms="search">

    <select class="border rounded px-3 py-2" wire:model.live="bank_id">
      <option value="">Banque (toutes)</option>
      @foreach($banks as $b)
        <option value="{{ $b->id }}">{{ $b->name }}</option>
      @endforeach
    </select>

    <select class="border rounded px-3 py-2" wire:model.live="bank_product_id" @disabled(!$bank_id)>
      <option value="">{{ $bank_id ? 'Produit (tous)' : 'Sélectionner une banque d’abord' }}</option>
      @foreach($products as $p)
        <option value="{{ $p->id }}">{{ $p->name }}</option>
      @endforeach
    </select>

    <select class="border rounded px-3 py-2" wire:model.live="status">
      <option value="">Statut (tous)</option>
      <option value="active">Actives</option>
      <option value="inactive">Inactives</option>
    </select>

    <select class="border rounded px-3 py-2" wire:model.live="perPage">
      <option value="10">10 / page</option>
      <option value="15">15 / page</option>
      <option value="25">25 / page</option>
      <option value="50">50 / page</option>
    </select>

    @can('create', \App\Models\ProductOffer::class)
      <a href="{{ route('bank_offer.create') }}" class="ml-auto inline-block bg-indigo-600 text-white px-4 py-2 rounded">
        + Nouvelle offre
      </a>
    @endcan
  </div>

  <div class="overflow-x-auto bg-white shadow rounded">
    <table class="min-w-full text-sm table table-bordered align-middle">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('name')">Nom</th>
          <th class="px-4 py-3">Produit</th>
          <th class="px-4 py-3">Banque</th>
          <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('is_active')">Active</th>
          <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('effective_from')">Depuis</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($offers as $o)
          <tr class="border-t">
            <td class="px-4 py-2 font-medium">{{ $o->name }}</td>
            <td class="px-4 py-2">{{ $o->product->name ?? '—' }}</td>
            <td class="px-4 py-2">{{ $o->product->bank->name ?? '—' }}</td>
            <td class="px-4 py-2">
              <span class="px-2 py-1 rounded text-xs {{ $o->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' }}">
                {{ $o->is_active ? 'Oui' : 'Non' }}
              </span>
            </td>
            <td class="px-4 py-2">{{ optional($o->effective_from)->format('Y-m-d') ?: '—' }}</td>
            <td class="px-4 py-2">
              <a href="{{ route('bank_offer.edit', $o) }}" class="underline btn btn-primary">Éditer</a>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucune offre trouvée.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div>
    {{ $offers->links() }}
  </div>
</div>
