<?php

namespace App\Http\Controllers\Private;

use App\Http\Services\Private\GamePlayerService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamePlayerController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new GamePlayerService();
    }


    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        return $this->service->store($request);
    }

    public function show(string $id)
    {
        //
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
