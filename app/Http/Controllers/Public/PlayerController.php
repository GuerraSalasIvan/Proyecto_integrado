<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Public\PlayerService;
use Illuminate\View\View;
use App\Models\Player;

class PlayerController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new PlayerService();
    }

    public function index()
    {
        return $this->service->index();
    }

    public function playerTeamRegister()
    {
        //
    }

    public function store(Request $request)
    {

        return $this->service->store($request);
    }

    public function show(Player $player)
    {
        return $this->service->show($player);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
