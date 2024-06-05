<?php

namespace App\Http\Services\Public;

use App\Repositories\UserRepository;
use App\Models\Ubication;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
use Illuminate\Http\Request;


class UbicationService
{
    public function index()
    {
        $response = Ubication::all();
        return response()->json($response, 200);
    }
}
