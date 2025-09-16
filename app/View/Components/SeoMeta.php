<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class SeoMeta extends Component
{
    public array $page;

    public function __construct(array $page = [])
    {
        $this->page = $page;
    }

    public function title(): string
    {
        $siteName  = config('app.name', 'Comparek');
        $fallback  = config('seo.default_title', 'Comparez banques, écoles & opérateurs au Sénégal');
        $title     = trim($this->page['meta_title'] ?? $this->page['title'] ?? '');
        $title     = $title !== '' ? $title : $fallback;

        if (!Str::contains($title, $siteName)) {
            $title = "{$title} | {$siteName}";
        }
        return Str::limit($title, 65, '…');
    }

    public function description(): string
    {
        $desc = trim($this->page['meta_description'] ?? '');
        $desc = $desc !== '' ? $desc : config('seo.default_description', 'Comparek simplifie vos choix au Sénégal : comparez offres bancaires, écoles et opérateurs télécoms avec des notes fiables.');
        $desc = Str::of(strip_tags($desc))->squish()->toString();
        return Str::limit($desc, 160, '…');
    }

    public function keywords(): string
    {
        $kw = trim($this->page['keywords'] ?? '');
        return $kw !== '' ? $kw : config('seo.default_keywords', 'comparateur Sénégal, banques Sénégal, écoles supérieures Sénégal, opérateurs télécoms Sénégal, Comparek');
    }

    public function robots(): string
    {
        $robots = trim($this->page['robots'] ?? '');
        return $robots !== '' ? $robots : config('seo.default_robots', 'index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1');
    }

    public function canonical(): string
    {
        $can = trim($this->page['canonical_url'] ?? '');
        return $can !== '' ? $can : url()->current();
    }

    public function ogTitle(): string
    {
        $og = trim($this->page['og_title'] ?? '');
        return $og !== '' ? $og : $this->title();
    }

    public function ogDescription(): string
    {
        $ogd = trim($this->page['og_description'] ?? '');
        return $ogd !== '' ? $ogd : $this->description();
    }

    public function ogImage(): string
    {
        $img = trim($this->page['og_image_path'] ?? '');
        if ($img === '') {
            $img = config('seo.default_og_image', '/assets/logo.png');
        }
        return Str::startsWith($img, ['http://', 'https://']) ? $img : url($img);
    }

    public function twitterCard(): string
    {
        $tc = trim($this->page['twitter_card'] ?? '');
        return $tc !== '' ? $tc : config('seo.twitter_card', 'summary_large_image');
    }

    public function locale(): string
    {
        return config('seo.locale', app()->getLocale() ?? 'fr_SN');
    }

    public function schemaJson(): ?string
    {
        $raw = $this->page['schema_json'] ?? null;
        if (is_string($raw) && trim($raw) !== '') {
            return $raw;
        }

        $data = [
            '@context' => 'https://schema.org',
            '@type'    => 'WebSite',
            'name'     => config('app.name', 'Comparek'),
            'url'      => $this->canonical(),
            'description' => $this->description(),
            'inLanguage'  => $this->locale(),
            'publisher'   => [
                '@type' => 'Organization',
                'name'  => config('app.name', 'Comparek'),
                'logo'  => [
                    '@type' => 'ImageObject',
                    'url'   => url(config('seo.publisher_logo', '/assets/logo.png')),
                    'width' => 512,
                    'height'=> 512,
                ],
            ],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target'=> url('/recherche') . '?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ];

        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View|Closure|string
    {
        return view('components.seo-meta');
    }
}
