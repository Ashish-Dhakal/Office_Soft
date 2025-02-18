<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'project_id',
        'description',
        'assigned_date',
        'completed_date',
        'started_date',
        'task_status',
        'comment',
        'due_date',
        'attachment',
        'task_priority', 
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