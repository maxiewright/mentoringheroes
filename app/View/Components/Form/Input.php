<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $placeholder;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $type
     * @param $name
     * @param $placeholder
     */
    public function __construct($type, $name, $placeholder)
    {
        $this->type = $type;
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
        return view('components.form.input');
    }
}
