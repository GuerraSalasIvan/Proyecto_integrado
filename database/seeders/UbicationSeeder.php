<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ubication;

class UbicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ubication::create([
            'name' => 'Ifni',
            'address' => 'Calle Ifni',
            'capacity' => '3',
        ]);

        Ubication::create([
            'name' => 'Maria Zambrano',
            'address' => 'Calle Alarifes, 3',
            'capacity' => '1',
        ]);

        Ubication::create([
            'name' => 'Poligono Sur',
            'address' => 'Calle poligono sur',
            'capacity' => '2',
        ]);
    }
}
