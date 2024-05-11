<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Game;


class GameFactory extends Factory
{

    public function definition(): array
    {

        $faker = \Faker\Factory::create();

        $localTeam = $faker->unique()->numberBetween(1, 6);
        $visitTeam = $faker->unique()->numberBetween(1, 6);

        while ($visitTeam === $localTeam) {
            $visitTeam = $faker->numberBetween(1, 6);
        }

        return [
                'match_date' => fake()->dateTimeBetween('-1 year', 'now'),
                'reports' => fake()->sentence(6),
                'local_team_id' => $localTeam,
                'visit_team_id' => $visitTeam,
                'league_id' => fake()->numberBetween(1, 3),
                'ubication_id' => fake()->numberBetween(1, 3),
            ];

    }
}
