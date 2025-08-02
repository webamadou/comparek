<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(?Category $category = null)
    {

    }

    public function view($post)
    {
        $post = Post::where('slug', $post)->with('category')->first();
        return view('view_article', compact('post'));
    }
}
