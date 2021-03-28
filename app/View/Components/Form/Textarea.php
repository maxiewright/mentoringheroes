<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $model;
    public $placeholder;
    public $cols;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @param $model
     * @param $placeholder
     * @param $cols
     * @param $rows
     */
    public function __construct($model, $placeholder, $cols, $rows)
    {
        $this->model = $model;
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
