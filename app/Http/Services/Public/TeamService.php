<?php

namespace App\Http\Services\Public;

use App\Repositories\UserRepository;
use App\Models\Player;
use App\Models\Team;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
// use App\Http\Requests\PlayerRequest;
use Illuminate\Http\Request;


class TeamService
{

    public function index()
    {
        $teams = Team::with('leagues')->get();
        $teams->each(function ($team) {
                $team->imageURL = $team->getFirstMediaURL();
        });

        $teams = $teams->map(function($team) {
            return [
                'id' => $team->id,
                'name' => $team->name,
                'league_id' => $team->league_id,
                'league_name' => $team->leagues ? $team->leagues->name : null,
                'imageURL' => $team->getFirstMediaURL(),

            ];
        });

        return response()->json(['teams' => $teams], 200);
    }

    public function getCurrentTeams ()
    {
        $currentYear = Carbon::now()->year;

        $teams = Team::whereHas('leagues', function ($query) use ($currentYear) {
            $query->where('year', '>=', $currentYear);
        })->with('leagues')->get();

        $teams->each(function ($team){
            $team->imageURL = $team->getFirstMediaURL();
        });

        return response()->json([
            'teams' => $teams,
        ]);

    }

    public function show(Team $team)
    {
        $team->load('players.gamePlayers');

        // Inicializar las variables para las estadísticas totales
        $totalPoints = 0;
        $totalRebounds = 0;
        $totalAssists = 0;
        $totalSteals = 0;
        $totalBlocks = 0;
        $totalFouls = 0;

        // Recorrer los jugadores del equipo
        foreach ($team->players as $player) {
            // Recorrer los game_players del jugador y sumar las estadísticas
            foreach ($player->gamePlayers as $gamePlayer) {
                $totalPoints += $gamePlayer->points;
                $totalRebounds += $gamePlayer->rebounds;
                $totalAssists += $gamePlayer->assists;
                $totalSteals += $gamePlayer->steals;
                $totalBlocks += $gamePlayer->blocks;
                $totalFouls += $gamePlayer->fouls;
            }
        }

        // Calcular el número total de jugadores en el equipo
        $totalPlayers = $team->players->count();

        // Calcular las estadísticas medias dividiendo la suma total por el número de jugadores
        $averageStats = [
            'points' => $totalPoints / $totalPlayers,
            'rebounds' => $totalRebounds / $totalPlayers,
            'assists' => $totalAssists / $totalPlayers,
            'steals' => $totalSteals / $totalPlayers,
            'blocks' => $totalBlocks / $totalPlayers,
            'fouls' => $totalFouls / $totalPlayers,
        ];

        return response()->json([
            'team' => $team,
            'averageStats' => $averageStats,
        ], 200);
    }


}
