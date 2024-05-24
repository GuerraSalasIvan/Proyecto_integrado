<?php

namespace App\Http\Services\Public;

use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
use App\Models\Game;
use App\Models\GameDetail;

class GameService
{
    public function show(Game $game)
    {
        $gameDetails = $game->gameDetails;

        $localTeamPlayersIds = $game->local_team->players->pluck('id')->toArray();
        $visitTeamPlayersIds = $game->visit_team->players->pluck('id')->toArray();

        $localTeamPlayers = $game->gamePlayers->filter(function ($player) use ($localTeamPlayersIds) {
            return in_array($player->player_id, $localTeamPlayersIds);
        });

        $visitTeamPlayers = $game->gamePlayers->filter(function ($player) use ($visitTeamPlayersIds) {
            return in_array($player->player_id, $visitTeamPlayersIds);
        });

        $localPoints = $gameDetails->local_first_cuarter + $gameDetails->local_second_cuarter + $gameDetails->local_third_cuarter + $gameDetails->local_fourth_cuarter;

        $visitPoints = $gameDetails->visit_first_cuarter + $gameDetails->visit_second_cuarter + $gameDetails->visit_third_cuarter + $gameDetails->visit_fourth_cuarter;

        $response = [
            'game' => $game,
            'localPoints' => $localPoints,
            'visitPoints' => $visitPoints,
            'localTeamPlayers' => $localTeamPlayers,
            'visitTeamPlayers' => $visitTeamPlayers
        ];

        return response()->json($response, 200);
    }
}
