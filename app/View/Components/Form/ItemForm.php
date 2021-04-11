<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class ItemForm extends Component
{
    /**
     * The collection of item types
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $types;

    /**
     * The item type id's
     *
     * @var int|null
     */
    public $type;

    /**
     * The item description
     *
     * @var string
     */
    
    public $description;
    /**
     * The item brand
     *
     * @var string
     */
    public $brand;

    /**
     * The total items that be added to the records
     *
     * @var int|null
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
     * @param array $types
     * @param int|null $quantity
     * @param int|null $type
     * @param string $brand
     * @param string $description
     * @param boolean $isUpdate
     */
    public function __construct(
        $types,
        $quantity = null,
        $type = null,
        string $brand,
        string $description,
        bool $isUpdate = false
    ) {
        $this->type = (int) $type;
        $this->brand = $brand;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->isUpdate = $isUpdate;
        $this->types = $types;
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
