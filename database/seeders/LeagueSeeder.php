<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\League;

class LeagueSeeder extends Seeder
{

    public function run(): void
    {
        League::create([
            'name' => '1º Provincial',
            'year' => '2023'
        ]);

        League::create([
            'name' => '2º Provincial',
            'year' => '2023'
        ]);

        League::create([
            'name' => '1º Provincial',
            'year' => '2022'
        ]);
    }
}
