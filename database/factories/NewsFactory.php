<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $image = [1,2,3,4,5];

        return [
            "title" => Str::title($title),
            "slug" => Str::slug($title),
            "body" => $this->faker->paragraph(),
            'image' => fake()->randomElement($image,) .'.png',
            "user_id" => User::all()->random()->id,
        ];
    }
}
