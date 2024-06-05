<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Game;
use Illuminate\View\View;
use App\Http\Services\Private\GameService;

class GameController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new GameService();
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }
}
