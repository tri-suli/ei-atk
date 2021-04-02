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
     * Check wheter the form is using to handle create or update
     *
     * @var bool
     */
    public $updating;

    /**
     * Create a new component instance.
     *
     * @param  string $name
     * @param  bool   $updating
     * @return void
     */
    public function __construct(string $name = null, bool $updating = false)
    {
        $this->name = $name;
        $this->updating = $updating;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.item-type-form', [
            'action' => 'action'
        ]);
    }
}
