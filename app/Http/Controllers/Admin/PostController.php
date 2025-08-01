<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::pluck('name', 'id')->toArray();
        return view('dashboard.posts.form', compact('post', 'categories'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        return redirect()->route('admin.posts.index')->with('success', 'Post créé.');
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('admin.posts.index')->with('success', 'Post mis à jour.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post supprimé.');
    }
}
