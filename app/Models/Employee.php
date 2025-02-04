<?php

namespace App\Models;

use App\Enums\EmployeeGender;
use App\Enums\EmployeeTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model

{
    protected $fillable = ['user_id', 'department_id', 'position_id','hire_date', 'dob', 'employee_type' , 'reporting_to','slack_id' , 'discord_id' ,];

    protected function casts(): array
    {
        return [
            'gender' => EmployeeGender::class,
            'employee_type' =>EmployeeTypeEnum::class
        ];
    }


    // Relationship to get the manager (the employee reports to this person)
    public function reportingTo()
    {
        return $this->belongsTo(Employee::class, 'reporting_to');
    }

    // Relationship to get the subordinates (employees reporting to this employee)
    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'reporting_to');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function tasks()
    {
        return $this->hasMany(EmployeeTask::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
