<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use App\Http\Services\Private\PlayerService;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\View\View;

class PlayerController extends Controller
{
    // private $service;

    // public function __construct()
    // {
    //     $this->service = new PlayerService();
    // }

    public function index()
    {
        // return $this->service->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
