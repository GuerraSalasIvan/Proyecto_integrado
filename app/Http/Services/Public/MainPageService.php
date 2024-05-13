<?php

namespace App\Http\Services\Public;

use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
use App\Models\Game;

class MainPageService
{
    public function index()
    {
        $today = Carbon::now();

        // Obtener los cuatro juegos más cercanos que ya hayan ocurrido
        $game = Game::where('match_date', '<', $today)
                    ->orderBy('match_date', 'desc')
                    ->take(4)
                    ->get();;
        return view('home',compact('game'));
    }

}
