<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $moreLink;

    public function __construct($title, $moreLink)
    {
        //
        $this->title = $title;
        $this->moreLink = $moreLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.section');
    }
}
