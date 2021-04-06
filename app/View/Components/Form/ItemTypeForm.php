<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class ItemTypeForm extends Component
{
    /**
     * The item types name's
     *
     * @var string
     */
    public $name;

    /**
     * Action url
     *
     * @var string
     */
    public $action;

    /**
     * Create a new component instance.
     *
     * @param  string $name
     * @param  string $action
     * @return void
     */
    public function __construct(string $name = null, string $action)
    {
        $this->name = $name;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.item-type-form');
    }
}
