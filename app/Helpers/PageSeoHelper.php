<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class PageSeoHelper
{
    public static function build(array $page, $model): array
    {
        $page['meta_title']         = $page['meta_title']        ?? $model->name ?? '';
        $page['meta_description']   = $page['meta_description']  ?? $model->description ?? '';
        $page['meta_keywords']      = $page['meta_keywords']     ?? $model->keywords ?? '';
        $page['canonical_url']      = $page['canonical_url']     ?? (method_exists($model, 'getRouteKey') ? route(Route::currentRouteName(), $model->slug) : '');
        $page['og_title']           = $page['og_title']          ?? $model->name ?? '';
        $page['og_description']     = $page['og_description']    ?? $model->description ?? '';
        $page['og_image']           = $page['og_image']          ?? $model->logo_url ?? '';
        $page['robots']             = $page['robots']            ?? 'index,follow';
        $page['twitter_card']       = 'summary_large_image';
        $page['twitter_title']      = $page['twitter_title']     ?? $model->name ?? '';
        $page['twitter_description']= $page['twitter_description']?? $model->description ?? '';
        $page['twitter_image']      = $page['twitter_image']     ?? ($model->images->path ?? '');
        return $page;
    }
}