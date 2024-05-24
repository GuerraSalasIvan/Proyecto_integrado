<?php

namespace App\View\Components\Team;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IndexCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $team,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render() |Closure|string
    {
        return view('components.team.index-card');
    }
}
