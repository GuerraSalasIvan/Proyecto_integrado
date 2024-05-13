<?php

namespace App\Http\Services\Public;

use App\Repositories\UserRepository;
use App\Models\Player;
use App\Models\Game;
use App\Models\Team;
use App\Models\GamePlayer;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
// use App\Http\Requests\PlayerRequest;
use Illuminate\Http\Request;


class PlayerService
{

    public function index()
    {
        //
    }

    public function show(Player $player)
    {
        $playerId = $player->id;
        $gamePlayers = GamePlayer::where('player_id', $playerId)->get();
        $totalGames = $gamePlayers->count();


        $averages = [
            'points' => number_format($totalGames > 0 ? $gamePlayers->sum('points') / $totalGames : 0, 1),
            'rebounds' => number_format($totalGames > 0 ? $gamePlayers->sum('rebounds') / $totalGames : 0, 1),
            'assists' => number_format($totalGames > 0 ? $gamePlayers->sum('assists') / $totalGames : 0, 1),
            'steals' => number_format($totalGames > 0 ? $gamePlayers->sum('steals') / $totalGames : 0, 1),
            'blocks' => number_format($totalGames > 0 ? $gamePlayers->sum('blocks') / $totalGames : 0, 1),
            'fouls' => number_format($totalGames > 0 ? $gamePlayers->sum('fouls') / $totalGames : 0, 1),
        ];


        $games = $player->games;

        foreach ($games as $game) {

            if ($game->local_team_id == $player->teams->first()->id) {
                $opponentTeam = Team::find($game->visit_team_id);

                break;
            } elseif ($game->visit_team_id == $player->teams->first()->id) {
                $opponentTeam = Team::find($game->local_team_id);
                break;
            }
        }

        $year = $player->games->first()->leagues->year;

        // Filtrar los juegos del jugador por temporada (año de la liga)
        $gamesBySeason = $player->games->filter(function ($game) use ($year) {
            return $game->leagues->year == $year;
        });
        $totalGamesBySeason = $gamesBySeason->count();

        $gamePlayersBySeason = collect(); // Inicializa una colección vacía para almacenar los gamePlayers

        foreach ($gamesBySeason as $game) {
            $gamePlayersBySeason = $gamePlayersBySeason->merge($game->gamePlayers);
        }
        $gamePlayersByPlayer = $gamePlayersBySeason->filter(function ($gamePlayer) use ($player) {
            return $gamePlayer->player_id == $player->id;
        });

        $seasonAverages = [
            'points' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('points') / $totalGamesBySeason : 0, 1),
            'rebounds' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('rebounds') / $totalGamesBySeason : 0, 1),
            'assists' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('assists') / $totalGamesBySeason : 0, 1),
            'steals' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('steals') / $totalGamesBySeason : 0, 1),
            'blocks' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('blocks') / $totalGamesBySeason : 0, 1),
            'fouls' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('fouls') / $totalGamesBySeason : 0, 1),
        ];


        return view('player.show', compact('player', 'gamePlayers', 'averages', 'games','seasonAverages'));
    }




}
