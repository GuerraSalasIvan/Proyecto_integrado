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

    public function getUserPlayer(Request $request)
    {
        $user = $request->user()->load('player.teams');
        $playerTeam = $request->user()->load('player.teams');

        $currentYear = Carbon::now()->year;

        $teams = Team::whereHas('leagues', function ($query) use ($currentYear) {
            $query->where('year', '>=', $currentYear);
        })->with('leagues')->get();

        return response()->json([
            'user' => $user,
            'teams' => $teams,
            'playerTeam' => $playerTeam,
        ]);
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
