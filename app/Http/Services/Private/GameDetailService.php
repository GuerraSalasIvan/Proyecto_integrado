<?php

namespace App\Http\Services\Private;

use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
use App\Models\Game;
use App\Models\GameDetail;
use Illuminate\Http\Request;

class GameDetailService
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'game_id' => 'required|integer',
            'local_first_cuarter' => 'required|integer',
            'visit_first_cuarter' => 'required|integer',
            'local_second_cuarter' => 'required|integer',
            'visit_second_cuarter' => 'required|integer',
            'local_third_cuarter' => 'required|integer',
            'visit_third_cuarter' => 'required|integer',
            'local_fourth_cuarter' => 'required|integer',
            'visit_fourth_cuarter' => 'required|integer',
            'mvp' => 'required|integer',
        ]);

        $gameDetail = GameDetail::create([
            'game_id' => $validatedData['game_id'],
            'local_first_cuarter' => $validatedData['local_first_cuarter'],
            'visit_first_cuarter' => $validatedData['visit_first_cuarter'],
            'local_second_cuarter' => $validatedData['local_second_cuarter'],
            'visit_second_cuarter' => $validatedData['visit_second_cuarter'],
            'local_third_cuarter' => $validatedData['local_third_cuarter'],
            'visit_third_cuarter' => $validatedData['visit_third_cuarter'],
            'local_fourth_cuarter' => $validatedData['local_fourth_cuarter'],
            'visit_fourth_cuarter' => $validatedData['visit_fourth_cuarter'],
            'mvp' => $validatedData['mvp'],
        ]);

        return response()->json([
            'message' => 'Game details saved successfully',
            'data' => $gameDetail
        ], 201);
    }
}
