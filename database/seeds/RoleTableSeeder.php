<?php

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::find(1);

        $user = User::find(2);

        Role::create(['name' => 'administrator']);

        Role::create(['name' => 'user']);

        $admin->assignRole('administrator');

        $user->assignRole('user');
    }
}
