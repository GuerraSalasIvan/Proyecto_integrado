<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\GameDetail;


class GameSeeder extends Seeder
{
    public function run()
    {
        // Crear 10 juegos
        Game::factory(10)->create()->each(function ($game) {
            // Para cada juego, crear detalles del juego
            $gameDetails = GameDetail::factory()->create([
                'game_id' => $game->id,
            ]);
        });
    }
}
