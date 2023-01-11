<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            AuthSeeder::class,
            UserSeeder::class,
            ProgramSeeder::class,
            NewsSeeder::class,
            JoinUsSeeder::class,
            DonateSeeder::class,
            UserJoinSeeder::class,
        ]);
    }
}
