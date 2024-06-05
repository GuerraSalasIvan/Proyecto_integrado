<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Services\Public\LeagueService;
use App\Models\League;

class LeagueController
{
    private $service;

    public function __construct()
    {
        $this->service = new LeagueService();
    }

    public function index()
    {
        return $this->service->index();
    }

    public function show(string $year)
    {
        return $this->service->show($year);
    }
}
