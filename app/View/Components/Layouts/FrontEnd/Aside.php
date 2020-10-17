<?php

namespace App\View\Components\Layouts\FrontEnd;

use App\Models\Category;
use Illuminate\View\Component;
use phpDocumentor\Reflection\Type;

class Aside extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct()
    {

    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.layouts.front-end.aside');
    }
}
