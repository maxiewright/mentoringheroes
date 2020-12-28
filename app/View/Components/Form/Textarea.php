<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $placeholder;
    public $cols;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param $placeholder
     * @param $cols
     * @param $rows
     */
    public function __construct($name, $placeholder, $cols, $rows)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->cols = $cols;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form.textarea');
    }
}
