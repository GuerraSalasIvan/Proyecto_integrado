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
            $query->where('year', '=', $currentYear);
        })->where('rol', 1)
        ->with('leagues')->get();

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

    $totalPoints = 0;
    $totalRebounds = 0;
    $totalAssists = 0;
    $totalSteals = 0;
    $totalBlocks = 0;
    $totalFouls = 0;

    if ($team->players->isNotEmpty()) {

        foreach ($team->players as $player) {

            foreach ($player->gamePlayers as $gamePlayer) {
                $totalPoints += $gamePlayer->points;
                $totalRebounds += $gamePlayer->rebounds;
                $totalAssists += $gamePlayer->assists;
                $totalSteals += $gamePlayer->steals;
                $totalBlocks += $gamePlayer->blocks;
                $totalFouls += $gamePlayer->fouls;
            }
        }

        $totalPlayers = $team->players->count();

        $averageStats = [
            'points' => $totalPoints / $totalPlayers,
            'rebounds' => $totalRebounds / $totalPlayers,
            'assists' => $totalAssists / $totalPlayers,
            'steals' => $totalSteals / $totalPlayers,
            'blocks' => $totalBlocks / $totalPlayers,
            'fouls' => $totalFouls / $totalPlayers,
        ];
    } else {

        $averageStats = [
            'points' => 0,
            'rebounds' => 0,
            'assists' => 0,
            'steals' => 0,
            'blocks' => 0,
            'fouls' => 0,
        ];
    }

    // Retornar la respuesta en formato JSON
    return response()->json([
        'team' => $team,
        'averageStats' => $averageStats,
    ], 200);
}



}
