<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comments extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comments;
    public $type;
    public $id;

    public function __construct($comments, $type, $id)
    {
        //
        $this->comments = $comments;
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.comments');
    }
}
