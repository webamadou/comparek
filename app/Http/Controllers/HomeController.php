<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::where('slug', 'la_page_daccueil')->first()?->toArray() ?? [];
        $illus = collect([2, 3, 5])->random();
        $latestPost = Post::orderBy('published_at', 'desc')->with('category')->first();
        $articles = Post::where('id', '!=', $latestPost?->id)->with('category')->take(4)->get();
        return view('home',  compact('illus', 'articles', 'latestPost', 'page'));
    }
}
