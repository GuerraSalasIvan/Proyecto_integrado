<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameDetail>
 */
class GameDetailFactory extends Factory
{

    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        
        return [
            'game_id' => function () {
                return \App\Models\Game::factory()->create()->id;
            },
            'local_first_cuarter' => $faker->numberBetween(0, 30),
            'visit_first_cuarter' => $faker->numberBetween(0, 30),
            'local_second_cuarter' => $faker->numberBetween(0, 30),
            'visit_second_cuarter' => $faker->numberBetween(0, 30),
            'local_third_cuarter' => $faker->numberBetween(0, 30),
            'visit_third_cuarter' => $faker->numberBetween(0, 30),
            'local_fourth_cuarter' => $faker->numberBetween(0, 30),
            'visit_fourth_cuarter' => $faker->numberBetween(0, 30),
            'mvp' => function () {
                return \App\Models\Player::factory()->create()->id;
            },
        ];
    }
}
