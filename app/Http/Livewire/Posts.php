<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::query()
                ->whereNotNull('published_at')
                ->orderBy('published_at', 'desc')
                ->paginate(6),

            'featuredPost' => Post::query()
            ->whereNotNull('published_at')
            ->where(function ($query){
                $query->where('is_featured', '=',true)
                    ->latest('published_at');
            })->first(),

        ]);
    }
}
