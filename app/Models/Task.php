<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'employee_id',
        'project_id',
        'description',
        'given_date',
        'completed_at',
        'started_at',
        'task_status',
        'comment',
        'due_date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function employeeTasks()
    {
        return $this->hasMany(EmployeeTask::class);
    }

    public function timers()
    {
        return $this->hasMany(ProjectTimer::class);
    }
}
