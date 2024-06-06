<?php

namespace App\Http\Controllers\Private;

use App\Http\Services\Private\GameDetailService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameDetailController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new GameDetailService();
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
