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
            'name' => '3º Provincial',
            'year' => '2023'
        ]);

        League::create([
            'name' => '4º Provincial',
            'year' => '2024'
        ]);

        League::create([
            'name' => '2º Provincial',
            'year' => '2022'
        ]);

        League::create([
            'name' => '5º Provincial',
            'year' => '2025'
        ]);

        League::create([
            'name' => '6º Provincial',
            'year' => '2026'
        ]);
    }
}
