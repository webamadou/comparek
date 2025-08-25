{{-- resources/views/livewire/bank-index.blade.php --}}
<div class="space-y-6">
  <div class="flex flex-wrap items-center gap-3">
    <input type="text" placeholder="Rechercher banque, BIC, slug…"
           class="border rounded px-3 py-2 w-64"
           wire:model.live.debounce.500ms="search">

    <select class="border rounded px-3 py-2" wire:model.live="category">
      <option value="">Catégorie (toutes)</option>
      <option value="bank">Banque</option>
      <option value="eme">Émetteur Monnaie Électronique</option>
      <option value="sfd">SFD (microfinance)</option>
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

    @can('create', \App\Models\Bank::class)
      <a href="{{ route('bank.create') }}" class="ml-auto inline-block bg-indigo-600 text-white px-4 py-2 rounded">
        + Nouvelle banque
      </a>
    @endcan
  </div>

  <div class="overflow-x-auto bg-white shadow rounded">
    <table class="min-w-full text-sm table table-bordered align-middle">
      <thead>
        <tr class="bg-gray-100 text-left">
          @php
            $th = fn($label,$field) => "<th class='px-4 py-3 cursor-pointer' wire:click=\"sortBy('{$field}')\">{$label}".($sortField===$field ? " <span>&#x25B2;&#x25BC;</span>" : "")."</th>";
          @endphp
          {!! $th('Nom','name') !!}
          {!! $th('Catégorie','category') !!}
          {!! $th('Active','is_active') !!}
          {!! $th('Créée','established_year') !!}
          {!! $th('Produits','products_count') !!}
          {!! $th('Agences','branches_count') !!}
          {!! $th('GAB','atms_count') !!}
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($banks as $bank)
          <tr class="border-t">
            <td class="px-4 py-2 font-medium">{{ $bank->name }}</td>
            <td class="px-4 py-2">{{ $bank->category }}</td>
            <td class="px-4 py-2">
              <span class="px-2 py-1 rounded text-xs {{ $bank->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' }}">
                {{ $bank->is_active ? 'Oui' : 'Non' }}
              </span>
            </td>
            <td class="px-4 py-2">{{ $bank->established_year ?: '—' }}</td>
            <td class="px-4 py-2">{{ $bank->products_count }}</td>
            <td class="px-4 py-2">{{ $bank->branches_count }}</td>
            <td class="px-4 py-2">{{ $bank->atms_count }}</td>
            <td class="px-4 py-2 space-x-2">
              <a href="{{ route('bank.edit', $bank) }}" class="underline btn btn-primary">Éditer</a>
            </td>
          </tr>
        @empty
          <tr><td colspan="8" class="px-4 py-6 text-center text-gray-500">Aucune banque trouvée.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div>
    {{ $banks->links() }}
  </div>
</div>
