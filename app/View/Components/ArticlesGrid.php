<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArticlesGrid extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $articles;
    public $links;

    public function __construct($articles, $links = null)
    {
        //
        $this->articles = $articles;
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.articles-grid');
    }
}
