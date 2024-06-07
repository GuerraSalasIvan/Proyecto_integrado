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

        $mvp = null;
        $maxScore = 0;

        foreach ($data['players'] as $playerData) {
            $score = $this->calculateScore($playerData);

            if ($score > $maxScore) {
                $maxScore = $score;
                $mvp = $playerData['player_id'];
            }

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

        $gameDetailService = new GameDetailService();
        $gameDetailService->setMvp($data['gameId'], $mvp);

        return response()->json(['message' => 'Game stats saved successfully'], 200);
    }


    private function calculateScore($playerData)
    {

        $pointsWeight = 3;
        $reboundsWeight = 2;
        $assistsWeight = 3;
        $stealsWeight = 4;
        $blocksWeight = 5;
        $foulsWeight = -1;

        $score = $playerData['points'] * $pointsWeight +
                 $playerData['rebounds'] * $reboundsWeight +
                 $playerData['assists'] * $assistsWeight +
                 $playerData['steals'] * $stealsWeight +
                 $playerData['blocks'] * $blocksWeight +
                 $playerData['fouls'] * $foulsWeight;

        return $score;
    }

}
