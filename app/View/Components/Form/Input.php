<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $model;
    public $placeholder;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $type
     * @param $model
     * @param $placeholder
     */
    public function __construct($type, $model, $placeholder)
    {
        $this->type = $type;
        $this->model = $model;
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
