<?php

namespace App\Http\Services\Public;

use App\Repositories\UserRepository;
use App\Models\Player;
use App\Models\Game;
use App\Models\GamePlayer;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
// use App\Http\Requests\PlayerRequest;
use Illuminate\Http\Request;


class PlayerService
{

    public function index()
    {
        //
    }

    public function show(Player $player)
{

    $playerId = $player->id;

    $gamePlayers = GamePlayer::where('player_id', $playerId)->get();

    $totalGames = $gamePlayers->count();

    $averages = [
        'points' => $totalGames > 0 ? $gamePlayers->sum('points') / $totalGames : 0,
        'rebounds' => $totalGames > 0 ? $gamePlayers->sum('rebounds') / $totalGames : 0,
        'assists' => $totalGames > 0 ? $gamePlayers->sum('assists') / $totalGames : 0,
        'steals' => $totalGames > 0 ? $gamePlayers->sum('steals') / $totalGames : 0,
        'blocks' => $totalGames > 0 ? $gamePlayers->sum('blocks') / $totalGames : 0,
        'fouls' => $totalGames > 0 ? $gamePlayers->sum('fouls') / $totalGames : 0,
    ];

    $games = $player->games;

    return view('player.show', compact('player', 'gamePlayers', 'averages', 'games'));
}



}
