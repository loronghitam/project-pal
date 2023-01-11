<?php

namespace Database\Factories;

use App\Models\JoinUs;
use App\Models\UserJoin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserJoin>
 */
class UserJoinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'motivation' => fake()->sentence(),
            'file' => fake()->name(),
            'joinus_id' => JoinUs::all()->random()->id,
        ];
    }
}
