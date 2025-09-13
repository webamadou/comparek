@props([
    // Données
    'superDomains' => collect(),           // pluck('name','id')
    'selectedSuperId' => null,             // request('super_domain_id')
    'selectedDomainId' => null,            // request('domain')
    'preloadedDomains' => collect(),       // pluck('name','id') si tu veux précharger

    // Options
    'endpoint' => route('program-domains.ajax'),
    'autoSubmit' => false,
    'formSelector' => '#filters-form',     // cible si autoSubmit
])

<div class="col-sm-12 col-md-3 form-group">
    <h3><span class="bi bi-bar-chart-steps"></span> {{__('schools.super_domain')}}</h3>
    <select id="super_domain_id" name="super_domain_id" class="form-select program-filter">
        <option value="">{{ __('schools.select_super_domain') }}</option>
        @foreach($superDomains as $id => $name)
            <option value="{{ $id }}" @selected(request('super_domain_id') == $id)>{{ __('schools.' . $name) }}</option>
        @endforeach
    </select>
</div>
{{-- Domaine (2e dropdown caché par défaut) --}}
<div class="col-sm-12 col-md-3 form-group" id="domain_wrapper" style="{{ $domains->isEmpty() ? 'display:none' : '' }}">
    <h3><span class="bi bi-bar-chart-steps"></span> {{__('schools.domains')}}</h3>
    <select id="domain_id" name="domain" class="form-select program-filter">
        <option value="">{{ __('schools.select_domain') }}</option>
        @foreach($domains as $id => $name)
            <option value="{{ $id }}" @selected(request('domain') == $id)>{{ $name }}</option>
        @endforeach
    </select>
</div>