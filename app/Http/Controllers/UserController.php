<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;

class UserController extends Controller
{

    public function getUser(Request $request)
    {
        return $request->user()->load('player.teams');
    }


    public function assignTeam(Request $request)
    {

        $request->validate([
            'playerId' => 'required|exists:players,id',
            'teamId' => 'required|exists:teams,id'
        ]);

        $player = Player::findOrFail($request->playerId);

        $player->teams()->attach($request->teamId);

        return response()->json(['message' => 'Team assigned successfully.']);
    }

}
