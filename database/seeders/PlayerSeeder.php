<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerSeeder extends Seeder
{

    public function run(): void
    {
        Player::factory()->count(39)->create();

        $player = Player::all();
        foreach($player as $player){
            $player->addMediaFromUrl('https://picsum.photos/400/400')
            ->toMediaCollection();
        }
    }
}
