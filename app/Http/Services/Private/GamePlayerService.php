<?php

namespace App\Http\Services\Private;

use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
use App\Models\Game;
use App\Models\GameDetail;
use App\Models\GamePlayer;
use Illuminate\Http\Request;

class GamePlayerService
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'gameId' => 'required|integer',
            'players' => 'required|array',
            'players.*.game_id' => 'required|integer',
            'players.*.player_id' => 'required|integer',
            'players.*.number' => 'required|integer',
            'players.*.points' => 'required|integer',
            'players.*.rebounds' => 'required|integer',
            'players.*.assists' => 'required|integer',
            'players.*.steals' => 'required|integer',
            'players.*.blocks' => 'required|integer',
            'players.*.fouls' => 'required|integer',
        ]);

        foreach ($data['players'] as $playerData) {
            GamePlayer::create([
                'game_id' => $playerData['game_id'],
                'player_id' => $playerData['player_id'],
                'number' => $playerData['number'],
                'points' => $playerData['points'],
                'rebounds' => $playerData['rebounds'],
                'assists' => $playerData['assists'],
                'steals' => $playerData['steals'],
                'blocks' => $playerData['blocks'],
                'fouls' => $playerData['fouls'],
            ]);
        }

        return response()->json(['message' => 'Game stats saved successfully'], 200);
    }

}
