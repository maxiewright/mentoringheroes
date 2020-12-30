<?php

namespace App\Http\Livewire\Layouts\FrontEnd;

use App\Models\Post;
use Livewire\Component;

class AsidePopular extends Component
{
    public $popularPosts = [];

    public function mount()
    {
        $this->popularPosts = Post::all();
    }

    public function render()
    {
        return view('livewire.layouts.front-end.aside-popular');
    }
}
