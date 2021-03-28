<?php

namespace App\Http\Livewire\Blog\Aside;

use Livewire\Component;

class TabComponent extends Component
{

    public string $menuItem = 'recent';

    public function setMenuItem($menuItem)
    {
        $this->menuItem = $menuItem;
    }

    public function render()
    {
        return view('livewire.blog.aside.tab-component');
    }
}
