<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AdresseSeeder::class,
            GammeSeeder::class,
            ArticleSeeder::class,
            AvisSeeder::class,
            CommandeSeeder::class,
            CampagneSeeder::class,
            FavoriSeeder::class,
            CampagneArticleSeeder::class,
            CommandeArticleSeeder::class

        ]);
        
    }
}
