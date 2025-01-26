<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
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

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'office@soft.com',
            'role'=> UserRoles::ADMIN,
        ]);
        $this->call(DepartmentSeeder::class);
        $this->call(PositionSeeder::class);
    }
}
