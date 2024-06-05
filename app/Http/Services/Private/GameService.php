<?php

namespace App\Http\Services\Private;

use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
use App\Models\Game;
use App\Models\GameDetail;
use Illuminate\Http\Request;

class GameService
{
    public function store(Request $request)
    {
        // Validar los datos recibidos en la solicitud
        $validatedData = $request->validate([
            'match_date' => 'required|date_format:Y-m-d H:i:s',
            'local_team_id' => 'required|integer|exists:teams,id',
            'visit_team_id' => 'required|integer|exists:teams,id',
            'league_id' => 'required|integer|exists:leagues,id',
            'ubication_id' => 'required|integer|exists:ubications,id',
        ]);

        try {
            // Crear una nueva instancia del modelo Game
            $game = new Game();
            $game->match_date = $validatedData['match_date'];
            $game->local_team_id = $validatedData['local_team_id'];
            $game->visit_team_id = $validatedData['visit_team_id'];
            $game->league_id = $validatedData['league_id'];
            $game->ubication_id = $validatedData['ubication_id'];

            // Guardar la instancia del modelo en la base de datos
            $game->save();

            // Retornar una respuesta adecuada
            return response()->json([
                'success' => true,
                'message' => 'Game created successfully',
                'data' => $game
            ], 201);
        } catch (\Exception $e) {
            // Manejar cualquier error que ocurra durante el proceso
            return response()->json([
                'success' => false,
                'message' => 'Error creating game: ' . $e->getMessage()
            ], 500);
        }
    }
}
