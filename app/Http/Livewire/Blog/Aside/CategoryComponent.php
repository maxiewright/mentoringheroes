<?php

namespace App\Http\Livewire\Blog\Aside;

use App\Models\Topic;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Topic::all();
    }

    public function render()
    {
        return view('livewire.blog.aside.category-component');
    }
}
