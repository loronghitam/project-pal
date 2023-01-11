<?php

namespace Database\Factories;

use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends Factory<Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        $image = [1, 2, 3, 4, 5];
        $desc = ["Tidak", "Iya"];
        return [
            "title" => Str::title($title),
            "slug" => Str::slug($title),
            "body" => $this->faker->paragraph(),
            "funding" => $this->faker->numberBetween(30000000, 500000000),
            'image' => fake()->randomElement($image,) . '.png',
            "status" => 'Aktif',
            "prioritas" => fake()->randomElement($desc),
            "end_program" => $this->faker->dateTimeBetween('now', '+12 month'),
            "user_id" => User::all()->random()->id,
        ];
    }
}
