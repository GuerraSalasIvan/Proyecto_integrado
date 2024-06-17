<?php

namespace App\Http\Services\Private;

use App\Repositories\UserRepository;
use App\Models\Player;
use App\Models\Team;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
use Illuminate\Http\Request;


class TeamService
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'league_id' => 'required|integer|exists:leagues,id',
            'external_team' => 'required|boolean'
        ]);


        $team = Team::create([
            'name' => $validated['name'],
            'league_id' => $validated['league_id'],
            'rol' => $validated['external_team'] ? 2 : 1
        ]);


        if ($validated['external_team']) {
            $player = Player::create([
                'full_name' => $validated['name'],
                'birthdate' => now(),
                'position' => 6,
                'user_id' => null
            ]);

            $team->players()->attach($player->id);
        }

        return response()->json(['message' => 'Team created successfully'], 201);
    }
}
