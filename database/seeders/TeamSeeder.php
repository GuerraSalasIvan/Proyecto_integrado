<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'name' => 'Maria Zambrano Azul',
            'league_id' => '1',
        ]);

        Team::create([
            'name' => 'Maria Zambrano Azul',
            'league_id' => '3',
        ]);

        Team::create([
            'name' => 'Maria Zambrano Rosa',
            'league_id' => '1',
        ]);

        Team::create([
            'name' => 'Maria Zambrano Rosa',
            'league_id' => '1',
        ]);

        Team::create([
            'name' => 'Maria Zambrano Morado',
            'league_id' => '2',
        ]);

        Team::create([
            'name' => 'Maria Zambrano Morado',
            'league_id' => '1',
        ]);

        $team = Team::all();

        foreach ($team as $team) {
            $teamId = $team->id;

            switch ($teamId) {
                case 1:
                case 2:
                    $imagePath = 'public/assests/img/logo_mz_azul.png';
                    break;
                case 3:
                case 4:
                    $imagePath = 'public/assests/img/logo_mz_rosa.png';
                    break;
                case 5:
                case 6:
                    $imagePath = 'public/assests/img/logo_mz_morado.png';
                    break;
                default:
                    $imagePath = '';
                    break;
            }

            if (!empty($imagePath)) {
                $team->addMedia($imagePath)
                    ->preservingOriginal()
                    ->toMediaCollection();
            }
        }

    }
}
