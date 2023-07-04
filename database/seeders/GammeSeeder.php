<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gamme;

class GammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gamme::create([
            'nom' => 'machine espresso manuelle'
          ]);
          Gamme::create([
            'nom' => 'machine espresso automatique'
          ]);
          Gamme::create([
            'nom' => 'machine à piston'
          ]);
          Gamme::create([
            'nom' => 'cafetière filtre'
          ]);
          Gamme::create([
            'nom' => 'café à grains'
          ]);
    }
}
