<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostsTable extends Component
{
    public $search = '';

    public function render()
    {
        $posts = Post::with('category','images')
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(10);

        return view('livewire.posts-table', compact('posts'));
    }
}
