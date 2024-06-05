<?php

namespace App\Http\Services\Public;

use App\Repositories\UserRepository;
use App\Models\League;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
use Illuminate\Http\Request;


class LeagueService
{

    public function index()
    {
        $response = League::all();
        return response()->json($response, 200);
    }

    public function show(string $year)
    {
        $response = League::where('year', $year)->get();
        return response()->json($response, 200);
    }
}
