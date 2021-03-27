<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class ShowPostComponent extends Component
{
    public Post $post;
    public $previousPost;
    public $nextPost;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->previousPost = Post::where('id', '<', $this->post->id)->first();
        $this->nextPost  = Post::where('id', '>', $this->post->id)->first();
    }

    public function next()
    {
        if ($this->nextPost){
            $this->post = $this->nextPost;
            $this->emit('refreshComponent');
        } else {
            dd('no more');
        }
    }

    public function previous()
    {
        if ($this->previousPost != null){
            $this->post = $this->previousPost;
            $this->emit('refreshComponent');
        }
    }

    public function render()
    {
        return view('livewire.blog.show-post-component')
            ->layout('components.layout.front-end.master');
    }
}
