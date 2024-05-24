<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Game;
use Illuminate\View\View;
use App\Http\Services\Public\GameService;

class GameController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new GameService();
    }


    public function index()
    {
        //
    }


    public function show(Game $game)
    {
        return $this->service->show($game);
    }


    public function destroy(string $id)
    {
        //
    }
}
