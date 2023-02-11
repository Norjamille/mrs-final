<?php

namespace Database\Seeders;

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
        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Midwife']);
        $role = Role::create(['name' => 'Patient']);

        $midwife = \App\Models\User::factory()->create([
            'name' => 'Ella Cruz',
            'email' => 'ellacruz@example.com',
        ]);

        $midwife->assignRole('Midwife');
    }
}
