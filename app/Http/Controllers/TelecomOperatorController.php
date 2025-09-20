<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\TelecomOfferFeature;
use App\Models\TelecomOperator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class TelecomOperatorController extends Controller
{
    /**
     * This is the list of the operators
     *
     * @return Factory|View|Application|object
     */
    public function operators()
    {
        $page = Page::where('slug', 'liste_des_operateurs')->first();
        $page = $page ? $page->toArray() : [];
        $operators = TelecomOperator::orderBy('name')->get();

        return view('operators', compact('operators', 'page'));
    }

    /**
     * This is the page os a sing operator
     *
     * @param TelecomOperator $operator
     * @return Factory|View|Application|object
     */
    public function operator(TelecomOperator $operator)
    {
        $pageObject = Page::where('slug', 'page_dun_operateur')->first();
        $pageArray = $pageObject ? $pageObject->toArray() : [];
        $page = [];

        $page['meta_title'] = __('offers.operator') . " {$operator->name}";
        $page['meta_description'] = $pageArray['meta_description'] ?? $operator?->description;
        $page['meta_keywords'] = $pageArray['meta_keywords'] ?? $operator?->keywords;
        $page['canonical_url'] = $pageArray['canonical_url'] ?? route('operator_page', $operator->slug);
        $page['og_title'] = __('offers.operator') . " {$operator->name}";
        $page['og_description'] = $pageArray['og_description'] ?? $operator->description;
        $page['og_image'] = $pageArray['og_image'] ?? $operator->logo_url;
        $page['robots'] = $pageArray['robots'] ?? 'index,follow';
        $page['og_locale'] = 'fr_SN';
        $page['og_type'] = 'website';
        $page['twitter_card'] = 'summary_large_image';
        $page['twitter_title'] = __('offers.operator') . " {$operator->name}";
        $page['twitter_description'] = $pageArray['twitter_description'] ?? $operator->description;
        $page['twitter_image'] = $pageArray['twitter_image'] ?? $operator->images->path;

        $operators = TelecomOperator::all()->reject(fn ($ope) => $ope == $operator);
        return view('operator', compact('operator',  'operators', 'page'));
    }

    /**
     *
     */
    public function internetOffers()
    {
        $pageObject = Page::where('slug', 'comparateur_des_offres_box_mobile')->first();
        $page = $pageObject ? $pageObject->toArray() : [];
        $operators = TelecomOperator::all();

        return view('telecoms_comparison', compact('operators', 'page'));
    }

    /**
     *
     */
    public function mobileOffers()
    {
        $pageObject = Page::where('slug', 'comparateur_des_offres_mobile')->first();
        $page = $pageObject ? $pageObject->toArray() : [];
        $operators = TelecomOfferFeature::all();

        return view('pass_comparison', compact('operators', 'page'));
    }

    public function scores()
    {
        $pageObject = Page::where('slug', 'comparek_score_des_offres_telecoms')->first();
        $page = $pageObject ? $pageObject->toArray() : [];

        return view('scores', compact('page'));
    }

    public function telecomsComparison()
    {
        $pageObject = Page::where('slug', 'comparateur_des_offres_box_mobile_1')->first();
        $page = $pageObject ? $pageObject->toArray() : [];

        return view('comparison_telecoms', compact('page'));
    }
}
