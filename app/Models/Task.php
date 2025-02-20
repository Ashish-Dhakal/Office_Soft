<?php

namespace App\Models;

use App\Enums\TaskPriority;
use App\Enums\TaskPriorityEnum;
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

    //cast
 
    protected function casts(): array
    {
        return [
          'task_priority' => TaskPriority::class,
        ];
    }

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