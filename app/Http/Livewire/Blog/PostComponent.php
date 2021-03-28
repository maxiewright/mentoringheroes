<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.blog.post-component', [
            'posts' => Post::query()
                ->with('categories', 'authors', 'tags')
                ->whereNotNull('published_at')
                ->orderBy('published_at', 'desc')
                ->paginate(6),

            'featuredPost' => Post::query()
                ->with('categories', 'authors', 'tags')
                ->whereNotNull('published_at')
                ->where(function ($query){
                    $query->where('is_featured', '=',true)
                        ->latest('published_at');
                })->first(),

        ])->layout('components.layout.app');
    }
}
