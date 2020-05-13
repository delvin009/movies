<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PopularShows extends Component
{

    public $popular;
    public $genres;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($popular, $genres)
    {
         $this->popular = $popular;
         $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.popular-shows');
    }
}
