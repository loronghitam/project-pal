<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'SuperAdmin',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Volunteer',
            'guard_name' => 'web'
        ]);
    }
}
