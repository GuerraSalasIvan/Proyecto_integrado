<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GameDetail;
use App\Models\GamePlayer;

class GamePlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtener todos los detalles de los juegos
        $gameDetails = GameDetail::all();

        // Iterar sobre cada detalle del juego
        foreach ($gameDetails as $gameDetail) {

            // Verificar si el detalle del juego tiene un juego asociado
            if ($gameDetail->games) {
                // Obtener los equipos locales y visitantes del juego

                $localTeamPlayers = $gameDetail->games->local_team->players ?? null;
                $visitTeamPlayers = $gameDetail->games->visit_team->players ?? null;

                // Verificar si los equipos y jugadores están definidos
                if ($localTeamPlayers && $visitTeamPlayers) {
                    // Generar datos para los jugadores del equipo local
                    foreach ($localTeamPlayers as $player) {
                        GamePlayer::factory()->create([
                            'game_id' => $gameDetail->game_id,
                            'player_id' => $player->id,
                            'number' => random_int(0, 99), // Número aleatorio de camiseta
                            'points' => random_int(0, 20), // Puntos aleatorios
                            'rebounds' => random_int(0, 15), // Rebotes aleatorios
                            'assists' => random_int(0, 15), // Asistencias aleatorias (corregido el nombre)
                            'steals' => random_int(0, 10), // Robos aleatorios
                            'blocks' => random_int(0, 10), // Bloqueos aleatorios
                            'fouls' => random_int(0, 5), // Faltas aleatorias
                        ]);
                    }

                    // Generar datos para los jugadores del equipo visitante
                    foreach ($visitTeamPlayers as $player) {
                        GamePlayer::factory()->create([
                            'game_id' => $gameDetail->game_id,
                            'player_id' => $player->id,
                            'number' => random_int(0, 99), // Número aleatorio de camiseta
                            'points' => random_int(0, 20), // Puntos aleatorios
                            'rebounds' => random_int(0, 15), // Rebotes aleatorios
                            'assists' => random_int(0, 15), // Asistencias aleatorias (corregido el nombre)
                            'steals' => random_int(0, 10), // Robos aleatorios
                            'blocks' => random_int(0, 10), // Bloqueos aleatorios
                            'fouls' => random_int(0, 5), // Faltas aleatorias
                        ]);
                    }
                }
            }
        }
    }
}
