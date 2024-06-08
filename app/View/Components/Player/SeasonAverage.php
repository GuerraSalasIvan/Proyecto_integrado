<?php

namespace App\View\Components\Player;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SeasonAverage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $averages
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render():Closure|string
    {
        return view('components.player.season-average');
    }
}
