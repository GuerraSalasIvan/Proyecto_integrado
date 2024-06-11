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
        $user = Auth::user()->player;
        return response()->json($user);
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

    public function updateUser(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'birthdate' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $player = $user->player;
        $player->full_name = $request->full_name;
        $player->birthdate = $request->birthdate;

        if ($request->hasFile('image')) {

            if ($player->getFirstMediaURL()) {
                $player->clearMediaCollection();
            }
            $player->addMedia( $request->image)->toMediaCollection();
        }

        $player->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }

}
