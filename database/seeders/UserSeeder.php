<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Midwife']);
        $role = Role::create(['name' => 'Patient']);

        // Create users
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        // Assign role to user
        $admin->assignRole('Admin');

        $midwife = \App\Models\User::factory()->create([
            'name' => 'Ella Cruz',
            'email' => 'ellacruz@example.com',
        ]);
        // Assign role to user
        $midwife->assignRole('Midwife');
        //

        // admin account
        // email: admin@gmail.com
        // password: password

        // midwife account
        // email: ellacruz@example.com
        // password: password
    }
}
