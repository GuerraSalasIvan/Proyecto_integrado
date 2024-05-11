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
        $currentYear = Carbon::now()->year;

        // $teams = Team::where('year', $currentYear-1)->get();
        $teams = Team::all();

        return view('team.index', compact('teams'));
    }

    public function show(Team $team)
    {

        return view('team.show',compact('team'));
    }

}
