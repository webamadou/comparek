<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Page::class, 'page');
    }

    public function index(Request $request)
    {
        return view('dashboard.pages.index');
    }

    public function create()
    {
        $page = new Page();
        return view('dashboard.pages.create', compact('page'));
    }

    public function store(\App\Http\Requests\StorePageRequest $request)
    {
        $data = $request->validated();

        $data['author_id'] = $request->user()?->id;
        $page = Page::create($data);

        return redirect()->route('page.edit', $page)->with('success', __('pages.created'));
    }

    public function show(Page $page)
    {return;
        return view('dashboard.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('dashboard.pages.edit', compact('page'));
    }

    public function update(\App\Http\Requests\UpdatePageRequest $request, Page $page)
    {
        $page->update($request->validated());

        return back()->with('success', __('pages.updated'));
    }

    public function destroy(Page $page)
    {
        if ($page->cannot_delete) {
            return redirect()->route('pages.index')->with('error', __('pages.cannot_delete'));
        }

        $page->delete();

        return redirect()->route('pages.index')->with('success', __('pages.deleted'));
    }
}
