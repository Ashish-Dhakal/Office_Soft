<?php

namespace App\Models;

use App\Enums\EmployeeGender;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user_id', 'department_id', 'position_id', 'address', 'hire_date', 'dob' , 'gender'];

    protected function casts(): array
    {
        return [
            'gender' => EmployeeGender::class,
        ];
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
