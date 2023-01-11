<?php

namespace Database\Factories;

use App\Models\Donate;
use App\Models\Program;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends Factory<Donate>
 */
class DonateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rekening = ['BRI', 'BCA', 'BSI'];
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'image' => 'bukti.jpg',
            'status' => 'Valid',
            'rekening' => fake()->randomElement($rekening),
            'amount' => fake()->numberBetween(100000, 10000000),
            'program_id' => Program::all()->random()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Donate $donate) {
            $program = Program::where('id', '=', $donate->program_id)->first();
            $amount = $program->collected + $donate->amount;
            Program::where('id', '=', $donate->program_id)->update([
                'collected' => $amount
            ]);
        });
    }
}
