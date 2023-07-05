<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Gamme;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' =>$this->faker->words(1, true),
            'description' =>$this->faker->words(10, true),
            'description_detaillee' =>$this->faker->words(50, true),
            'image' => 'default_picture_'.rand(1,5). '.jpg',
            'prix' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->randomNumber(3, true),
            'gamme_id' =>rand(1, Gamme::count()),

        ];
    }
}
