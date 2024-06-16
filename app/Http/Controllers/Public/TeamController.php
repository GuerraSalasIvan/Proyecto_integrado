<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Public\TeamService;
use Carbon\Carbon;
use App\Models\Team;
use Illuminate\View\View;

class TeamController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new TeamService();
    }

    public function index()
    {
        return $this->service->index();
    }

    public function getCurrentTeams(Request $request)
    {
        return $this->service->getCurrentTeams($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return $this->service->show($team);
    }

    /**
     * Show the form for editing the specified resource.
     */
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
