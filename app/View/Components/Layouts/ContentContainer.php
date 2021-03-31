<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class ContentContainer extends Component
{
    /**
     * Describe the page name
     *
     * @var string
     */
    public $pageName;

    /**
     * Describe the title page
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string $pageName
     * @param string $title
     */
    public function __construct(string $pageName, string $title)
    {
        $this->pageName = $pageName;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.content-container');
    }
}
