<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;
use App\Models\Team;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'birthdate' =>fake()->date(),
            'position' => fake()->numberBetween(1, 5),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Player $player) {
            // Obtén un equipo aleatorio
            $team = Team::inRandomOrder()->first();

            // Asocia al jugador con el equipo
            $player->teams()->attach($team);
        });
    }
}
