<?php

namespace App\View\Components\Game;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GameDetail extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $game,
        public $localPoints,
        public $visitPoints,
        public $localTeamPlayers,
        public $visitTeamPlayers
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game.game-detail');
    }
}
