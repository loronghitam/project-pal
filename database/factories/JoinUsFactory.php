<?php

namespace Database\Factories;

use App\Models\JoinUs;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<JoinUs>
 */
class JoinUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $image = [1,2,3,4,5];
        return [
            'title' => Str::title($title),
            'slug' => Str::slug($title),
            'body' => fake()->paragraph(),
            'image' => fake()->randomElement($image,) .'.png',
        ];
    }
}
