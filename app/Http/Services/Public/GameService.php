<?php

namespace App\Http\Services\Public;

use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
use App\Models\Game;
use App\Models\GameDetail;

class GameService
{
    public function index()
    {
        $gamesWithoutDetails = Game::with(['local_team', 'visit_team', 'leagues', 'ubications', 'gameDetails'])
            ->whereDoesntHave('gameDetails')
            ->get();

        return response()->json($gamesWithoutDetails, 200);
    }

    public function calendar()
    {
        $gamesWithoutDetails = Game::with(['local_team', 'visit_team', 'leagues', 'ubications', 'gameDetails'])
            ->whereDoesntHave('gameDetails')
            ->orderBy('match_date', 'asc')
            ->take(4)
            ->get();

        return response()->json($gamesWithoutDetails, 200);
    }


    public function arbitrated()
{
    $gamesWithDetails = Game::with(['local_team', 'visit_team', 'leagues', 'ubications', 'gameDetails'])
        ->has('gameDetails')
        ->orderBy('match_date', 'desc')
        ->take(10)
        ->get();

    return response()->json($gamesWithDetails, 200);
}


    public function show(Game $game)
    {
        $game->load(['local_team.players' => function ($query) {
            $query->where('position', '!=', 0);
        }, 'visit_team.players' => function ($query) {
            $query->where('position', '!=', 0);
        }]);

        return response()->json($game, 200);
    }



    public function details(Game $game)
    {
        $gameDetails = $game->gameDetails;

        $localTeamPlayersIds = $game->local_team->players->pluck('id')->toArray();
        $visitTeamPlayersIds = $game->visit_team->players->pluck('id')->toArray();

        $localTeamPlayers = $game->gamePlayers->filter(function ($player) use ($localTeamPlayersIds) {
            return in_array($player->player_id, $localTeamPlayersIds);
        });

        $visitTeamPlayers = array_values($game->gamePlayers->filter(function ($player) use ($visitTeamPlayersIds) {
            return in_array($player->player_id, $visitTeamPlayersIds);
        })->toArray());

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
