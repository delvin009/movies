<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NowPlaying extends Component
{
    public $now;
    public $genres;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($now, $genres)
    {
        $this->now = $now;
        $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.now-playing');
    }
}
