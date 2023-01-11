<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            "username" => "pengelola",
            "name" => "pengelola",
            "email" => "pengelola@mail.com",
            "password" => Hash::make("password"),
        ])->assignRole('SuperAdmin');
        User::create([
            "username" => "admin",
            "name" => "admin",
            "email" => "admin@mail.com",
            "password" => Hash::make("password"),
        ])->assignRole('Admin');
        User::create([
            "username" => "volunteer",
            "name" => "volunteer",
            "email" => "volunteer@mail.com",
            "password" => Hash::make("password"),
        ])->assignRole('Volunteer');
    }
}
