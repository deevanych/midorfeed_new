<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tags extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tags;

    public function __construct($tags)
    {
        //
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.tags');
    }
}
