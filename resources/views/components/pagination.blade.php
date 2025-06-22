<div class="d-flex justify-content-between align-items-center my-3">

    {{-- Per-page selector --}}
    <div class="form-inline">
        <label for="perPage" class="mr-2">Afficher :</label>
        <select id="perPage" wire:model="perPage" class="form-select d-inline w-auto">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select> par page
    </div>

    {{-- Showing X to Y of Z --}}
    <div>
        Affichage de
        {{ ($paginator->firstItem() ?? 0) }}
        à
        {{ ($paginator->lastItem() ?? 0) }}
        sur
        {{ $paginator->total() }} résultats
    </div>

</div>

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo; Précédent</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled" href="#">
                        &laquo; Précédent
                    </a>
                </li>
            @endif

            {{-- Page Links --}}
            @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active">
                        <span class="page-link">{{ $page }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" wire:click="gotoPage({{ $page }})" wire:loading.attr="disabled" href="#">
                            {{ $page }}
                        </a>
                    </li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled" href="#">
                        Suivant &raquo;
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Suivant &raquo;</span>
                </li>
            @endif

        </ul>
    </nav>

    {{-- Loading indicator --}}
    <div wire:loading wire:target="gotoPage, previousPage, nextPage, perPage" class="text-center mt-2">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
    </div>

@endif
