<?php

namespace App\Http\Livewire\Blog\Aside;

use App\Models\Post;
use Livewire\Component;

class RecentPostComponent extends Component
{
    public function getRecentPostsProperty()
    {
        return  Post::query()
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.blog.aside.recent-post-component', [
            'recentPosts' => $this->recentPosts
        ]);
    }
}
