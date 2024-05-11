<?php

namespace Database\Factories;

use App\Models\GamePlayer;
use App\Models\GameDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class GamePlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GamePlayer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Obtener todos los detalles del juego de manera aleatoria
        $gameDetail = GameDetail::inRandomOrder()->first();

        if ($gameDetail && $gameDetail->game) {
            // Obtener el equipo local y sus jugadores
            $localTeamPlayers = $gameDetail->game->local_team->players;

            // Elegir un jugador al azar del equipo local
            $player = $localTeamPlayers->random();

            return [
                'game_id' => $gameDetail->game_id,
                'player_id' => $player->id,
                'number' => $this->faker->numberBetween(0, 99),
                'points' => $this->faker->numberBetween(0, 20),
                'rebounds' => $this->faker->numberBetween(0, 15),
                'assists' => $this->faker->numberBetween(0, 15),
                'steals' => $this->faker->numberBetween(0, 10),
                'blocks' => $this->faker->numberBetween(0, 10),
                'fouls' => $this->faker->numberBetween(0, 5),
            ];
        }

        // Manejar el caso donde no se encontró un juego asociado al detalle del juego
        // Puedes lanzar una excepción, registrar un mensaje de error, o manejarlo de otra manera según tus necesidades

        return [];
    }
}
