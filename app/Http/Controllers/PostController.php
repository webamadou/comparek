<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(?Category $category = null)
    {
        $posts = Post::where('is_published', 1);
        if ($category) {
            $posts = $posts->whereHas('category', fn ($query) => $query->where('slug', $category->slug));

        }
        $title = $category ? __('posts.the_posts_of', ['category' => $category->name]) : __('posts.all_posts');
        $posts = $posts->orderBy('created_at', 'desc')->get();

        return view('view_articles', compact('posts', 'title', 'category'));
    }

    public function view($post)
    {
        $post = Post::where('slug', $post)->with('category')->first();
        return view('view_article', compact('post'));
    }
}
