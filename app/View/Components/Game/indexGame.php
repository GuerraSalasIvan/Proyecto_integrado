<?php

namespace App\View\Components\Game;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class indexGame extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $game,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render() |Closure|string
    {
        return view('components.game.index-game');
    }
}
