<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class CampagneArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <31; $i++){
            DB::table('campagnes_articles')->insert([
                'article_id' => $i,
                'campagne_id' => rand(1, 4)
            ]);

        }


    }
}
