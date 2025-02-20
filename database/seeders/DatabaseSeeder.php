<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
use App\Models\Department;
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

        $this->call([
            DepartmentSeeder::class,
            PositionSeeder::class,
            RoleSeeder::class,
            ShieldSeeder::class,
        ]);

        // Create admin user
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'office@soft.com',
        ]);
        $user->syncRoles([UserRoles::SUPER_ADMIN]);
    }
}
