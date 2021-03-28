<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class ShowPostComponent extends Component
{
    public $post;
    public $previousPost;
    public $nextPost;

    public function mount($postId)
    {
        $this->post = Post::findOrFail($postId);
        $this->previousPost = Post::where('id', '<', $this->post->id)->first();
        $this->nextPost  = Post::where('id', '>', $this->post->id)->first();
    }

    public function render()
    {
        return view('livewire.blog.show-post-component')
            ->layout('components.layout.app');
    }
}
