<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Purok;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
        ]);

        Purok::create([
            'name' => 'Purok 1',
        ]);

        Purok::create([
            'name' => 'Purok 2',
        ]);

        Purok::create([
            'name' => 'Purok 3',
        ]);

        Purok::create([
            'name' => 'Purok 4',
        ]);

        Purok::create([
            'name' => 'Purok 5',
        ]);

        Purok::create([
            'name' => 'Purok 6',
        ]);
    }
}
