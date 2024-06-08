<?php

namespace App\View\Components\Match;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlayerMatch extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $games,
        public $player,
        public $gamePlayers,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render():Closure|string
    {
        return view('components.match.player-match');
    }
}
