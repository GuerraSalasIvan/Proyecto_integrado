<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class PlayerTeamSeeder extends Seeder
{

    public function run()
    {
        // Obtener todos los jugadores
        $players = Player::all();

        // Obtener los equipos
        $team1 = Team::find(1);
        $team3 = Team::find(3);
        $team5 = Team::find(5);

        // Asociar jugadores con equipos
        $team1->players()->attach($players->take(12));
        $team3->players()->attach($players->slice(12, 12));
        $team5->players()->attach($players->slice(24, 12));
    }

}
