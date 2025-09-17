<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = \App\Models\Page::where('slug', $slug)->firstOrFail();

        return view('page')->with('page', $page->toArray());
    }

    public function about()
    {
        $page = \App\Models\Page::where('slug', 'qui_sommes_nous')->firstOrFail();

        return view('page')->with('page', $page->toArray());
    }

    public function privacyPolicy()
    {
        $page = \App\Models\Page::where('slug', 'politique-confidentialite')->firstOrFail();

        return view('page')->with('page', $page->toArray());
    }

    public function disclaimer()
    {
        $page = \App\Models\Page::where('slug', 'mentions-legales')->firstOrFail();

        return view('page')->with('page', $page->toArray());
    }

    public function contact()
    {
        $page = \App\Models\Page::where('slug', 'contactez-nous')->firstOrFail();

        return view('contact')->with('page', $page->toArray());
    }
}
