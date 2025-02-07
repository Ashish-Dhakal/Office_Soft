<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'client_id',
        'title',
        'project_summary',
        'start_date',
        'deadline_date',
        'completed_date',
        'cancelled_date',
        'due_date',
        'status',
        'budget',
        'notes',
        'file',
        'project_notification',
        'is_active',
        'task_board',
        'gannt_chart'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
