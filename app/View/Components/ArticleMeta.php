<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArticleMeta extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $rating;
    public $readTime;
    public $commentsCount;
    public $views;

    public function __construct($rating, $readTime, $commentsCount, $views)
    {
        //
        $this->rating = $rating;
        $this->readTime = $readTime;
        $this->commentsCount = $commentsCount;
        $this->views = $views;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.article-meta');
    }
}
