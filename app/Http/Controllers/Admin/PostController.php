<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Services\ImageService;

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

    public function store(PostsRequest $request)
    {
        $data = $request->validated();

        if ($post = Post::create($data)) {
            if ($request->hasFile('logo_path')) {
                $path = Image::storeAndOptimize($data['logo_path'], 'logos', true);
                $data['logo_path'] = $request->file('logo_path')->store('logos', 'public');

                $post->images()->create(['path' => $path, 'is_primary' => true]);
            }
        }

        return redirect()->route('post.index')->with('success', 'Post créé.');
    }

    public function show(Post $post){}

    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('dashboard.posts.form', compact('post', 'categories'));
    }

    public function update(PostsRequest $request, Post $post, ImageService $imageService)
    {
        $data = $request->validated();

        if ($request->hasFile('feature_image')) {
            $file = $request->file('feature_image');
            $post->images()->delete();
            $imageService->store(
                $file,
                $post,
                [
                    'is_default' => true,
                    'alt_text'   => $post->name,
                    'caption'    => $post->name,
                    'sort_order' => 1,
                ]
            );
        }

        $post->update($request->validated());
        return redirect()->back()->with('success', 'Post mis à jour.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post supprimé.');
    }
}
