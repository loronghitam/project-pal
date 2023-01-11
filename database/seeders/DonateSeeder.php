<?php

namespace Database\Seeders;

use App\Models\Donate;
use Illuminate\Database\Seeder;

class DonateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Donate::factory(10)->create();
    }
}
