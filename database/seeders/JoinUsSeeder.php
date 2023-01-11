<?php

namespace Database\Seeders;

use App\Models\JoinUs;
use Illuminate\Database\Seeder;

class JoinUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        JoinUs::factory(5)->create();
    }
}
