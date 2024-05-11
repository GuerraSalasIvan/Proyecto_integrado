<?php

namespace App\Http\Services\Public;

use App\Repositories\UserRepository;
use App\Models\Player;
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
        
        return view('player.show',compact('player'));
    }
}
