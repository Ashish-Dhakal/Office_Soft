<?php
namespace Database\Seeders;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all departments to link positions to them
        $departments = Department::all();

        // Loop through each department and create sample positions
        foreach ($departments as $department) {
            switch ($department->name) {
                case 'Software Development':
                    Position::create([
                        'title' => 'Software Developer',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Lead Developer',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Backend Developer',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Quality Assurance':
                    Position::create([
                        'title' => 'QA Engineer',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'QA Lead',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Sales':
                    Position::create([
                        'title' => 'Sales Manager',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Sales Representative',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Marketing':
                    Position::create([
                        'title' => 'Marketing Manager',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Content Creator',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Accounting':
                    Position::create([
                        'title' => 'Accountant',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Financial Analyst',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Legal':
                    Position::create([
                        'title' => 'Legal Advisor',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Corporate Counsel',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'IT':
                    Position::create([
                        'title' => 'IT Support Specialist',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Network Engineer',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Engineering':
                    Position::create([
                        'title' => 'Mechanical Engineer',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Electrical Engineer',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Design':
                    Position::create([
                        'title' => 'UI/UX Designer',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Graphic Designer',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Finance':
                    Position::create([
                        'title' => 'Financial Controller',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Investment Analyst',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Operations':
                    Position::create([
                        'title' => 'Operations Manager',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Operations Coordinator',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Customer Service':
                    Position::create([
                        'title' => 'Customer Support Representative',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Customer Service Manager',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Product Management':
                    Position::create([
                        'title' => 'Product Manager',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Product Owner',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Business Development':
                    Position::create([
                        'title' => 'Business Development Manager',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Partnerships Manager',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Research and Development':
                    Position::create([
                        'title' => 'R&D Engineer',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Research Scientist',
                        'department_id' => $department->id,
                    ]);
                    break;

                case 'Human Resources':
                    Position::create([
                        'title' => 'HR Manager',
                        'department_id' => $department->id,
                    ]);
                    Position::create([
                        'title' => 'Recruitment Specialist',
                        'department_id' => $department->id,
                    ]);
                    break;

                default:
                    // Add any other departments or positions as needed
                    break;
            }
        }
    }
}
