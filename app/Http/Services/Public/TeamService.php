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
        $team->load('players');
        $team->imageURL = $team->getFirstMediaURL();

        $team->players->each(function ($player) {
            $player->imageURL = $player->getFirstMediaURL();
        });

        return response()->json(['team' => $team], 200);
    }

}
