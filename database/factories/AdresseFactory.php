<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresse>
 */
class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adresse' => $this ->faker->secondaryAddress(),
            'code_postal' => substr($this->faker->departmentNumber() . '000', 0, 5),
            'ville' => $this->faker->city(),
            'user_id' =>rand(1, User::count()),
        ];
    }
}
