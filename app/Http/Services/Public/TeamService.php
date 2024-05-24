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

        // Transformar los datos para incluir el nombre de la liga
        $teams = $teams->map(function($team) {
            return [
                'id' => $team->id,
                'name' => $team->name,
                'league_id' => $team->league_id,
                'league_name' => $team->leagues ? $team->leagues->name : null,

            ];
        });
        return response()->json(['teams' => $teams], 200);
    }

    public function show(Team $team)
    {
        $team->load('players');
        return response()->json(['team' => $team], 200);
    }

}
