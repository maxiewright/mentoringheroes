<?php

namespace App\Http\Livewire\Layouts\FrontEnd;

use App\Models\Category;
use Livewire\Component;

class AsideCategories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.layouts.front-end.aside-categories');
    }
}
