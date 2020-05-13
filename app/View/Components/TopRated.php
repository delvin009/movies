<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopRated extends Component
{

    public $toprated;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($toprated)
    {
        $this->toprated = $toprated;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.top-rated');
    }
}
