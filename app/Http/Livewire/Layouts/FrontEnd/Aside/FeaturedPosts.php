<?php

namespace App\Http\Livewire\Layouts\FrontEnd\Aside;

use App\Models\Post;
use Livewire\Component;

class FeaturedPosts extends Component
{
    public $featuredPosts = [];

    public function mount()
    {
        $this->featuredPosts = Post::query()
            ->whereNotNull('published_at')
            ->where(function ($query){
                $query->where('is_featured', '=',true)
                    ->latest('published_at');
            })
            ->limit(5)
            ->get();
    }


    public function render()
    {
        return view('livewire.layouts.front-end.aside.featured-posts');
    }
}
