<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Text extends Component
{
    public $name;
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param $placeholder
     */
    public function __construct($name, $placeholder)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input.text');
    }
}
