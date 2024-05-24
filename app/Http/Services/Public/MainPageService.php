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
    $games = Game::with(['local_team', 'visit_team', 'gameDetails.mvps'])
                ->where('match_date', '<', $today)
                ->orderBy('match_date', 'desc')
                ->take(4)
                ->get();

    $games = $games->map(function($game) {
        return [
            'id' => $game->id,
            'match_date' => $game->match_date,
            'reports' => $game->reports,
            'local_team' => $game->local_team->name,
            'visit_team' => $game->visit_team->name,
            'local_team_score' => $game->gameDetails->local_first_cuarter +
                                  $game->gameDetails->local_second_cuarter +
                                  $game->gameDetails->local_third_cuarter +
                                  $game->gameDetails->local_fourth_cuarter,

            'visit_team_score' => $game->gameDetails->visit_first_cuarter +
                                  $game->gameDetails->visit_second_cuarter +
                                  $game->gameDetails->visit_third_cuarter +
                                  $game->gameDetails->visit_fourth_cuarter,

            'mvp' => $game->gameDetails->mvps->full_name,
            'league' => $game->leagues->name,
        ];
    });

    return response()->json($games, 200);
    }


}
