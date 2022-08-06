<?php

namespace App\Http\Livewire\Blog\Aside;

use App\Models\Post;
use Livewire\Component;

class FeaturedPostComponent extends Component
{
    public function getFeaturedPostsProperty()
    {
        return  Post::query()
            ->whereNotNull('published_at')
            ->where(function ($query) {
                $query->where('is_featured', '=', true)
                    ->latest('published_at');
            })
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.blog.aside.featured-post-component', [
            'featuredPosts' => $this->featuredPosts,
        ]);
    }
}
