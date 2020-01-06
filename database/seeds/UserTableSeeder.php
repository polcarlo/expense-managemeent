<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.net',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@test.net',
            'password' => bcrypt('password'),
        ]);
    }
}
