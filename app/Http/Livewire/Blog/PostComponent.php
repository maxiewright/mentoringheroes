<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.blog.post-component', [
            'posts' => \App\Models\Post::query()
                ->whereNotNull('published_at')
                ->orderBy('published_at', 'desc')
                ->paginate(6),

            'featuredPost' => \App\Models\Post::query()
                ->whereNotNull('published_at')
                ->where(function ($query){
                    $query->where('is_featured', '=',true)
                        ->latest('published_at');
                })->first(),
        ])->layout('components.layout.front-end.master');
    }
}
