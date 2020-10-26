<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArticlesSlider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $articles;
    public $mainArticle;

    public function __construct($articles)
    {
        //
        $this->mainArticle = $articles->shift();
        $this->articles = $articles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.articles-slider');
    }
}
