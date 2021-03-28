<?php

namespace App\Http\Livewire\Blog\Aside;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.blog.aside.category-component');
    }
}
