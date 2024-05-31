<?php

namespace App\Http\Services\Public;

use App\Repositories\UserRepository;
use App\Models\Player;
use App\Models\Game;
use App\Models\Team;
use App\Models\GamePlayer;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;
// use App\Http\Requests\PlayerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PlayerService
{

    public function index()
    {
        // Cargar equipos con sus jugadores
        $teams = Team::with('players')->get();
        $result = [];

        // Iterar sobre cada equipo y sus jugadores
        foreach ($teams as $team) {
            $playersWithImages = $team->players->map(function ($player) {
                $player->imageURL = $player->getFirstMediaURL(); // Asignar la URL de la imagen
                return $player;
            });
            $result[$team->name] = $playersWithImages;
        }

        // Obtener jugadores sin equipo
        $playersWithoutTeams = Player::doesntHave('teams')->get();
        $playersWithoutTeamsWithImages = $playersWithoutTeams->map(function ($player) {
            $player->imageURL = $player->getFirstMediaURL(); // Asignar la URL de la imagen
            return $player;
        });

        // Añadir jugadores sin equipo al resultado
        $result['Sin equipo'] = $playersWithoutTeamsWithImages;

        // Devolver la respuesta JSON
        return response()->json($result);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:100',
            'birthdate' => 'required|date',
            'position' => 'required|integer|between:1,5',
        ]);


        $player = new Player($validated);
        $player->user_id = Auth::id();
        $player->save();

        return response()->json(['message' => 'Player created successfully', 'player' => $player], 201);
    }



    public function show(Player $player)
    {
        $playerId = $player->id;
        $player->imageURL = $player->getFirstMediaURL(); // Añadir el campo imageURL al objeto player

        $teamId = $player->teams->first()->id;
        $gamePlayers = GamePlayer::where('player_id', $playerId)->get();
        $totalGames = $gamePlayers->count();

        $averages = [
            'points' => number_format($totalGames > 0 ? $gamePlayers->sum('points') / $totalGames : 0, 1),
            'rebounds' => number_format($totalGames > 0 ? $gamePlayers->sum('rebounds') / $totalGames : 0, 1),
            'assists' => number_format($totalGames > 0 ? $gamePlayers->sum('assists') / $totalGames : 0, 1),
            'steals' => number_format($totalGames > 0 ? $gamePlayers->sum('steals') / $totalGames : 0, 1),
            'blocks' => number_format($totalGames > 0 ? $gamePlayers->sum('blocks') / $totalGames : 0, 1),
            'fouls' => number_format($totalGames > 0 ? $gamePlayers->sum('fouls') / $totalGames : 0, 1),
        ];

        $year = $player->games->first()->leagues->year;

        $gamesBySeason = $player->games->filter(function ($game) use ($year) {
            return $game->leagues->year == $year;
        });
        $totalGamesBySeason = $gamesBySeason->count();

        $gamePlayersBySeason = collect(); // Inicializa una colección vacía para almacenar los gamePlayers

        foreach ($gamesBySeason as $game) {
            $gamePlayersBySeason = $gamePlayersBySeason->merge($game->gamePlayers);
        }
        $gamePlayersByPlayer = $gamePlayersBySeason->filter(function ($gamePlayer) use ($player) {
            return $gamePlayer->player_id == $player->id;
        });

        $seasonAverages = [
            'points' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('points') / $totalGamesBySeason : 0, 1),
            'rebounds' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('rebounds') / $totalGamesBySeason : 0, 1),
            'assists' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('assists') / $totalGamesBySeason : 0, 1),
            'steals' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('steals') / $totalGamesBySeason : 0, 1),
            'blocks' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('blocks') / $totalGamesBySeason : 0, 1),
            'fouls' => number_format($totalGamesBySeason > 0 ? $gamePlayersByPlayer->sum('fouls') / $totalGamesBySeason : 0, 1),
        ];

        // Modificar gamePlayers para incluir los datos del juego correspondiente y el equipo rival
        $modifiedGamePlayers = $gamePlayers->map(function ($gamePlayer) use ($teamId) {
            $game = $gamePlayer->game; // Obtener el juego correspondiente

            // Determinar el equipo rival
            $rivalTeam = $game->local_team_id == $teamId ? $game->visit_team : $game->local_team;

            return [
                'id' => $gamePlayer->id,
                'points' => $gamePlayer->points,
                'rebounds' => $gamePlayer->rebounds,
                'assists' => $gamePlayer->assists,
                'steals' => $gamePlayer->steals,
                'blocks' => $gamePlayer->blocks,
                'fouls' => $gamePlayer->fouls,
                'number' => $gamePlayer->number,
                'player_id' => $gamePlayer->player_id,
                'game' => $game, // Incluir el juego completo
                'rival_team' => $rivalTeam->name, // Incluir el nombre del equipo rival
                'created_at' => $gamePlayer->created_at,
                'updated_at' => $gamePlayer->updated_at,
                'deleted_at' => $gamePlayer->deleted_at,
            ];
        });

        $response = [
            'player' => $player,
            'averages' => $averages,
            'seasonAverages' => $seasonAverages,
            'gamePlayers' => $modifiedGamePlayers,
        ];

        return response()->json($response, 200);
    }










}
