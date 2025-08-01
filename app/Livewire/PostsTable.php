<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostsTable extends Component
{
    public $search = '';
    public bool $showDeleteModal = false;
    public $deleteId;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        Post::find($this->deleteId)?->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Enregistrement supprim<UNK>!');
    }

    public function render()
    {
        $posts = Post::with('category','images')
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(10);

        return view('livewire.posts-table', compact('posts'));
    }
}
