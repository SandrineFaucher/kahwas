<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campagne;

class CampagneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campagne::create([
            'nom' => 'Soldes de printemps 2023',
            'date_debut' => '2023-04-01',
            'date_fin' => '2023-04-30',
            'reduction' => 15,
          ]);
          Campagne::create([
            'nom' => 'Super soldes d\'été 2023',
            'date_debut' => '2023-07-01',
            'date_fin' => '2023-07-31',
            'reduction' => 30,
          ]);
          Campagne::create([
            'nom' => 'Black Friday 2023',
            'date_debut' => '2023-11-15',
            'date_fin' => '2023-11-30',
            'reduction' => 60,
          ]);
          Campagne::create([
            'nom' => 'Soldes d\'hiver 2023-2024',
            'date_debut' => '2023-12-26',
            'date_fin' => '2024-01-15',
            'reduction' => 15,
          ]);
    }
}
