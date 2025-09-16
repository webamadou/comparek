@php
$vals = [
    // meta de base
    'title'                => $title(),
    'meta_description'     => $description(),
    'meta_keywords'        => $keywords(),
    'robots'               => $robots(),
    'canonical'            => $canonical(),

    // Open Graph
    'og_type'              => 'website',
    'og_url'               => $canonical(),
    'og_title'             => $ogTitle(),
    'og_description'       => $ogDescription(),
    'og_image'             => $ogImage(),
    'og_locale'            => $locale(),

    // Twitter
    'twitter_card'         => $twitterCard(),
    'twitter_title'        => $ogTitle(),
    'twitter_description'  => $ogDescription(),
    'twitter_image'        => $ogImage(),
];

// $vals['title'] = $ogTitle();

// JSON-LD brut ; à rendre via {!! yield('schema_json') !!} dans le layout si tu veux
$schema = $schemaJson();
@endphp

@foreach ($vals as $key => $value)
    @section($key, $value)
@endforeach

@if ($schema)
    @section('schema_json', $schema)
@endif
