<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class ItemForm extends Component
{
    /**
     * The item type id's
     *
     * @var int
     */
    public $type;

    /**
     * The item name
     *
     * @var string
     */
    public $name;

    /**
     * The item brand
     *
     * @var string
     */
    public $brand;

    /**
     * The total items that be added to the records
     *
     * @var int
     */
    public $quantity;

    /**
     * Check if the form is used for update record
     *
     * @var bool
     */
    public $isUpdate;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        int $type,
        string $name,
        string $brand,
        int $quantity,
        bool $isUpdate = false
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->brand = $brand;
        $this->quantity = $quantity;
        $this->isUpdate = $isUpdate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.item-form');
    }
}
