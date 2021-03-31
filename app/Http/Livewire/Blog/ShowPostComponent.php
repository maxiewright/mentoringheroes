<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class ShowPostComponent extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.blog.show-post-component',[
            'previousPost' => Post::where('id', '<', $this->post->id)->first(),
            'nextPost' => Post::where('id', '>', $this->post->id)->first()
        ])
            ->layout('components.layout.app');
    }
}
