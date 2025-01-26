<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            "name"=> "Software Development",
        ]);
        Department::create([
            "name"=> "Quality Assurance",
        ]);
        Department::create([
            "name"=> "Sales",
        ]);
        Department::create([
            "name"=> "Marketing",
        ]);
        Department::create([
            "name"=> "Accounting",
        ]);
        Department::create([
            "name"=> "Legal",
        ]);
        Department::create([
            "name"=> "IT",
        ]);
        Department::create([
            "name"=> "Engineering",
        ]);
        Department::create([
            "name"=> "Design",
        ]);
        Department::create([
            "name"=> "Finance",
        ]);
        Department::create([
            "name"=> "Operations",
        ]);
        Department::create([
            "name"=> "Customer Service",            
        ]);
        Department::create([
            "name"=> "Product Management",
        ]);
        Department::create([
            "name"=> "Business Development",            
        ]);
        Department::create([
            "name"=> "Research and Development",            
        ]);
        Department::create([
            "name"=> "Human Resources",            
        ]);
    }
}
