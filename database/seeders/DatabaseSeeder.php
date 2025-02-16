<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        BusinessType::create([ 'name' => 'Distribuidor' ]);
        BusinessType::create([ 'name' => 'Cooperativas' ]);
        BusinessType::create([ 'name' => 'Atacadista' ]);
        BusinessType::create([ 'name' => 'Comerciante' ]);
        BusinessType::create([ 'name' => 'Associação' ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
