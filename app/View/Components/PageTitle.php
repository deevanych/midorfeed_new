<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $description;

    public function __construct($title, $description = null)
    {
        //
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.page-title');
    }
}
